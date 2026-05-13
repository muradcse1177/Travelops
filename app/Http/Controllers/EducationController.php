<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class EducationController extends Controller
{
    public function countryDataScrapper()
    {
        try {
            $url = 'https://edvoy.com/countries/study-in-uk/';
            $client = new Client(['verify' => false, 'timeout' => 60]);
            $response = $client->get($url);
            $html = $response->getBody()->getContents();
            $crawler = new Crawler($html);

            $data = [];

            // 🌍 Stats
            $data['stats'] = [
                'international_students' => '758K',
                'happiness_ranking' => '20',
                'employment_rate' => '75%'
            ];

            // 🎓 Why study in UK
            $data['why_study_in_uk'] = $crawler->filterXPath('//h2[contains(.,"Why study in the UK")]/following-sibling::div')->count()
                ? trim($crawler->filterXPath('//h2[contains(.,"Why study in the UK")]/following-sibling::div')->text())
                : '';

            // 🏷️ Popular Programs
            $data['popular_programs'] = $crawler->filterXPath('//h2[contains(.,"Popular programs")]/ancestor::div[contains(@class,"mb-8")]//div[contains(@class,"rounded-full")]')
                ->each(fn($n) => trim($n->text()));

            // 📜 Basic Requirements
            $data['basic_requirements'] = $crawler->filterXPath('//h2[contains(.,"Basic requirements")]/ancestor::div[contains(@class,"mb-8")]//div[@class="grid"]//p')
                ->each(fn($n) => trim($n->text()));

            if (empty($data['basic_requirements'])) {
                // alternate fallback
                $data['basic_requirements'] = $crawler->filterXPath('//h2[contains(.,"Basic requirements")]/ancestor::div[contains(@class,"mb-8")]//div[contains(@class,"flex")]/p')
                    ->each(fn($n) => trim($n->text()));
            }

            // 💡 What sets the UK apart
            $data['what_sets_the_uk_apart'] = $crawler->filterXPath('//h2[contains(.,"What sets the UK apart")]/ancestor::div[contains(@class,"mb-8")]//p')->count()
                ? trim($crawler->filterXPath('//h2[contains(.,"What sets the UK apart")]/ancestor::div[contains(@class,"mb-8")]//p')->text())
                : '';

            // 🧑‍🎓 Student Life
            $student = $crawler->filterXPath('//h2[contains(.,"Student life")]/ancestor::div[contains(@class,"mb-8")]');
            $data['student_life'] = [
                'overview' => $student->filter('.desc-cont')->count() ? trim($student->filter('.desc-cont')->first()->text()) : '',
                'min_wage' => $student->filterXPath('//p[contains(.,"Min. wage")]/following::div[1]')->count()
                    ? trim($student->filterXPath('//p[contains(.,"Min. wage")]/following::div[1]')->text())
                    : '',
                'max_work_hours' => $student->filterXPath('//p[contains(.,"Max. allowed")]/following::div[1]')->count()
                    ? trim($student->filterXPath('//p[contains(.,"Max. allowed")]/following::div[1]')->text())
                    : ''
            ];

            // 💰 Cost of Living
            $data['cost_of_living'] = $crawler->filterXPath('//h2[contains(.,"Cost of living")]/ancestor::div[contains(@class,"border-gray-100")]//li')
                ->each(fn($n) => trim($n->text()));

            // 🪪 Visa and Work Permit
            $data['visa_and_work_permit'] = $crawler->filterXPath('//h2[contains(.,"Visa and work permit")]/ancestor::div[contains(@class,"border-gray-100")]//li')
                ->each(fn($n) => trim($n->text()));

            // 💼 Employment Opportunities
            $data['employment_opportunities'] = $crawler->filterXPath('//h2[contains(.,"Employment opportunities")]/ancestor::div[contains(@class,"border-gray-100")]//li')
                ->each(fn($n) => trim($n->text()));

            // ❓ FAQs
            $data['faqs'] = $crawler->filterXPath('//h2[contains(.,"Frequently asked questions")]/ancestor::div[contains(@class,"mb-8")]//div[contains(@class,"referralFaq_referralAccordion__oeayD")]')
                ->each(function ($node) {
                    $q = $node->filter('h3')->count() ? trim($node->filter('h3')->text()) : '';
                    $a = $node->filter('.prose p')->count()
                        ? trim(collect($node->filter('.prose p')->each(fn($p) => $p->text()))->implode("\n"))
                        : '';
                    return ['question' => $q, 'answer' => $a];
                });

            return response()->json([
                'status' => 'success',
                'source' => $url,
                'data' => $data
            ], 200, [], JSON_PRETTY_PRINT);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }
}
