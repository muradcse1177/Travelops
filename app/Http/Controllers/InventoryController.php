<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class InventoryController extends Controller
{
    // 🟡 Show Category List (agent-wise)
    public function categoryManagement()
    {
        $agentId = Session::get('agent_id');

        $categories = DB::table('inventory_category')
            ->where('agent_id', $agentId)
            ->orderByDesc('id')
            ->get();

        return view('inventory.categoryManagement', compact('categories'));
    }

    // 🟢 Create Category
    public function createCategory(Request $request)
    {
        $agentId = Session::get('agent_id');

        $request->validate([
            'name' => [
                'required',
                'max:100',
                function ($attribute, $value, $fail) use ($agentId) {
                    $exists = DB::table('inventory_category')
                        ->where('agent_id', $agentId)
                        ->where('name', $value)
                        ->exists();
                    if ($exists) {
                        $fail('This category name already exists for your account.');
                    }
                },
            ],
        ]);

        DB::table('inventory_category')->insert([
            'agent_id'    => $agentId,
            'name'        => $request->name,
            'description' => $request->description,
            'status'      => $request->status ?? 1,
            'created_at'  => now(),
        ]);

        return back()->with('successMessage', 'Category added successfully!');
    }


    // 🟣 Edit Page (show form)
    public function editCategoryPage(Request $request)
    {
        $agentId  = Session::get('agent_id');
        $category = DB::table('inventory_category')
            ->where('id', $request->id)
            ->where('agent_id', $agentId)
            ->first();

        if (!$category) {
            return redirect()->route('inventory.categoryManagement')
                ->with('errorMessage', 'Category not found or unauthorized access!');
        }

        return view('inventory.editCategory', compact('category'));
    }

    // 🟦 Update Category
    public function updateCategory(Request $request)
    {
        $agentId = Session::get('agent_id');

        $request->validate([
            'id'   => 'required|exists:inventory_category,id',
            'name' => [
                'required',
                'max:100',
                function ($attribute, $value, $fail) use ($agentId, $request) {
                    $exists = DB::table('inventory_category')
                        ->where('agent_id', $agentId)
                        ->where('name', $value)
                        ->where('id', '!=', $request->id)
                        ->exists();
                    if ($exists) {
                        $fail('This category name already exists for your account.');
                    }
                },
            ],
        ]);

        DB::table('inventory_category')
            ->where('id', $request->id)
            ->where('agent_id', $agentId)
            ->update([
                'name'        => $request->name,
                'description' => $request->description,
                'status'      => $request->status,
                'updated_at'  => now(),
            ]);

        return redirect()->route('inventory.categoryManagement')
            ->with('successMessage', 'Category updated successfully!');
    }


    // 🟥 Delete Category
    public function deleteCategory(Request $request)
    {
        $agentId = Session::get('agent_id');

        DB::table('inventory_category')
            ->where('id', $request->id)
            ->where('agent_id', $agentId)
            ->delete();

        return back()->with('successMessage', 'Category deleted successfully!');
    }
    public function productManagement(Request $request)
    {
        $agentId = Session::get('agent_id');

        $categories = DB::table('inventory_category')
            ->where('agent_id', $agentId)
            ->orderBy('name')->get();

        $employees = DB::table('employees')
            ->where('agent_id', $agentId)
            ->orderBy('name')->get();

        $query = DB::table('inventory_product')
            ->leftJoin('inventory_category', 'inventory_product.category_id', '=', 'inventory_category.id')
            ->leftJoin('employees', 'inventory_product.employee_id', '=', 'employees.id')
            ->select('inventory_product.*', 'inventory_category.name as category_name', 'employees.name as employee_name')
            ->where('inventory_product.agent_id', $agentId);

        if ($request->filled('category_id')) {
            $query->where('inventory_product.category_id', $request->category_id);
        }

        $products = $query->orderByDesc('inventory_product.id')->get();

        return view('inventory.productManagement', compact('categories', 'employees', 'products'));
    }


    public function createProduct(Request $request)
    {
        $agentId = Session::get('agent_id');

        $request->validate([
            'category_id'  => 'required|exists:inventory_category,id',
            'employee_id'  => 'nullable|exists:employees,id',
            'name'         => 'required|max:150',
            'price'        => 'nullable|numeric|min:0',
            'quantity'     => 'nullable|numeric|min:1',
            'warranty_expire' => 'nullable|date',
            'buy_file'     => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $buyFilePath = null;

        if ($request->hasFile('buy_file')) {
            $targetFolder = 'public/images/upload/products/';
            $file = $request->file('buy_file');

            // Make sure directory exists
            if (!file_exists($targetFolder)) {
                mkdir($targetFolder, 0777, true);
            }

            // Create unique filename
            $pname = time() . '_' . $file->getClientOriginalName();

            // Move the file manually
            $file->move($targetFolder, $pname);

            // Store full path
            $buyFilePath = $targetFolder . $pname;
        }

        DB::table('inventory_product')->insert([
            'agent_id'        => $agentId,
            'category_id'     => $request->category_id,
            'employee_id'     => $request->employee_id,
            'name'            => $request->name,
            'price'           => $request->price ?? 0,
            'description'     => $request->description,
            'vendor_name'     => $request->vendor_name,
            'quantity'        => $request->quantity ?? 1,
            'buy_file'        => $buyFilePath,
            'warranty_expire' => $request->warranty_expire,
            'status'          => $request->status ?? 1,
            'created_at'      => now(),
        ]);

        return back()->with('successMessage', 'Product added successfully!');
    }

    public function editProductPage(Request $request)
    {
        $agentId = Session::get('agent_id');

        $product = DB::table('inventory_product')
            ->where('id', $request->id)
            ->where('agent_id', $agentId)
            ->first();

        if (!$product) {
            return redirect()->route('inventory.productManagement')->with('error', 'Product not found!');
        }

        $categories = DB::table('inventory_category')
            ->where('agent_id', $agentId)
            ->orderBy('name')->get();

        $employees = DB::table('employees')
            ->where('agent_id', $agentId)
            ->orderBy('name')->get();

        return view('inventory.editProduct', compact('product', 'categories', 'employees'));
    }
    public function updateProduct(Request $request)
    {
        $agentId = Session::get('agent_id');

        $request->validate([
            'id'            => 'required|exists:inventory_product,id',
            'category_id'   => 'required|exists:inventory_category,id',
            'employee_id'   => 'nullable|exists:employees,id',
            'name'          => 'required|max:150',
            'price'         => 'nullable|numeric|min:0',
            'quantity'      => 'nullable|numeric|min:1',
            'warranty_expire' => 'nullable|date',
            'buy_file'      => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $oldData = DB::table('inventory_product')
            ->where('id', $request->id)
            ->where('agent_id', $agentId)
            ->first();

        $buyFilePath = $oldData->buy_file;

        if ($request->hasFile('buy_file')) {
            $targetFolder = 'public/images/upload/products/';
            $file = $request->file('buy_file');

            if (!file_exists($targetFolder)) {
                mkdir($targetFolder, 0777, true);
            }

            $pname = time() . '_' . $file->getClientOriginalName();
            $file->move($targetFolder, $pname);
            $buyFilePath = $targetFolder . $pname;
        }

        DB::table('inventory_product')
            ->where('id', $request->id)
            ->where('agent_id', $agentId)
            ->update([
                'category_id'     => $request->category_id,
                'employee_id'     => $request->employee_id,
                'name'            => $request->name,
                'price'           => $request->price ?? 0,
                'description'     => $request->description,
                'vendor_name'     => $request->vendor_name,
                'quantity'        => $request->quantity ?? 1,
                'buy_file'        => $buyFilePath,
                'warranty_expire' => $request->warranty_expire,
                'status'          => $request->status ?? 1,
                'updated_at'      => now(),
            ]);

        return redirect()->route('inventory.productManagement')->with('successMessage', 'Product updated successfully!');
    }


    public function deleteProduct(Request $request)
    {
        $agentId = Session::get('agent_id');

        DB::table('inventory_product')
            ->where('id', $request->id)
            ->where('agent_id', $agentId)
            ->delete();

        return back()->with('successMessage', 'Product deleted successfully!');
    }

    public function downloadAcknowledgementSlip(Request $request)
    {
        $agentId = Session::get('agent_id');
        $company = DB::table('users')->where('id', $agentId)->first();
        $product = DB::table('inventory_product')
            ->leftJoin('employees', 'inventory_product.employee_id', '=', 'employees.id')
            ->leftJoin('inventory_category', 'inventory_product.category_id', '=', 'inventory_category.id')
            ->select(
                'inventory_product.*',
                'employees.name as employee_name',
                'employees.designation',
                'employees.phone',
                'inventory_category.name as category_name'
            )
            ->where('inventory_product.id', $request->id)
            ->where('inventory_product.agent_id', $agentId)
            ->first();

        if (!$product) {
            return back()->with('error', 'Product not found or unauthorized.');
        }

        $pdf = Pdf::loadView('inventory.acknowledgementSlip', compact('product','company'))
            ->setPaper('A4', 'portrait');

        $filename = 'Acknowledgement_Slip_' . str_replace(' ', '_', $product->name) . '.pdf';
        return $pdf->download($filename);
    }
}
