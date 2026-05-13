<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>New Study Abroad Application</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body style="margin:0;padding:0;background:#e8ecf5;font-family:'Segoe UI',Arial,sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#e8ecf5">
<tr><td align="center" style="padding:40px 16px;">

  <table width="580" cellpadding="0" cellspacing="0" border="0" style="max-width:580px;width:100%;">

    {{-- ===== TOP LOGO BAR ===== --}}
    <tr>
      <td align="center" style="padding-bottom:20px;">
        @if(!empty($company->logo))
          <img src="{{ asset($company->logo) }}" alt="{{ $company->name ?? '' }}" style="height:44px;display:block;">
        @else
          <span style="font-size:20px;font-weight:800;color:#04107C;letter-spacing:1px;">{{ $company->name ?? 'TAM' }}</span>
        @endif
      </td>
    </tr>

    {{-- ===== HERO BANNER ===== --}}
    <tr>
      <td style="background:linear-gradient(135deg,#04107C 0%,#0d2db4 60%,#1e56e8 100%);border-radius:14px 14px 0 0;padding:40px 40px 32px;text-align:center;">
        <div style="display:inline-block;background:rgba(255,255,255,0.15);border-radius:50%;width:64px;height:64px;line-height:64px;font-size:32px;margin-bottom:16px;">🎓</div>
        <h1 style="margin:0 0 8px;color:#ffffff;font-size:24px;font-weight:700;letter-spacing:0.2px;">New Study Abroad Application</h1>
        <p style="margin:0;color:rgba(255,255,255,0.7);font-size:13px;">Submitted on {{ now()->format('d M Y, h:i A') }}</p>
      </td>
    </tr>

    {{-- ===== WHITE BODY ===== --}}
    <tr>
      <td style="background:#ffffff;padding:36px 40px 28px;">

        <p style="margin:0 0 4px;font-size:17px;font-weight:700;color:#1a1a2e;">Hello, Admin 👋</p>
        <p style="margin:0 0 28px;font-size:14px;color:#6b7280;line-height:1.7;">
          A new study abroad application has just been submitted via your portal. Here are the details:
        </p>

        {{-- ===== INFO ROWS ===== --}}
        <table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-radius:10px;overflow:hidden;border:1px solid #e5e9f5;">

          @php
          $rows = [
            ['bg'=>'#f9faff','icon'=>'👤','label'=>'Applicant Name', 'value'=> $application->name ?? '—'],
            ['bg'=>'#ffffff','icon'=>'✉️','label'=>'Email Address',   'value'=> $application->email ?? '—'],
            ['bg'=>'#f9faff','icon'=>'📞','label'=>'Phone Number',    'value'=> ($application->country_code ?? '').($application->phone ?? '—')],
            ['bg'=>'#ffffff','icon'=>'📚','label'=>'Course',          'value'=> $application->course_name ?? '—'],
            ['bg'=>'#f9faff','icon'=>'🏫','label'=>'University',      'value'=> $application->university_name ?? '—'],
            ['bg'=>'#ffffff','icon'=>'🌍','label'=>'Country',         'value'=> $application->country_name ?? '—'],
          ];
          @endphp

          @foreach($rows as $row)
          <tr style="background:{{ $row['bg'] }};">
            <td style="padding:13px 18px;width:44%;border-bottom:1px solid #eef1f9;">
              <span style="font-size:13px;color:#9ca3af;">{{ $row['icon'] }}&nbsp; {{ $row['label'] }}</span>
            </td>
            <td style="padding:13px 18px;border-bottom:1px solid #eef1f9;">
              <span style="font-size:13px;font-weight:600;color:#1f2937;">{{ $row['value'] }}</span>
            </td>
          </tr>
          @endforeach

        </table>

        {{-- ===== TRACKING BADGE ===== --}}
        <table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-top:20px;">
          <tr>
            <td style="background:#f0f4ff;border-radius:8px;padding:14px 18px;border-left:4px solid #04107C;">
              <span style="font-size:12px;color:#6b7280;text-transform:uppercase;letter-spacing:0.5px;">Tracking ID</span><br>
              <span style="font-size:16px;font-weight:700;color:#04107C;letter-spacing:1px;">{{ $application->tracking_id ?? '—' }}</span>
            </td>
          </tr>
        </table>

        {{-- ===== CTA BUTTON ===== --}}
        <table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-top:28px;">
          <tr>
            <td align="center">
              <a href="#" style="display:inline-block;background:#04107C;color:#ffffff;text-decoration:none;font-size:14px;font-weight:600;padding:14px 38px;border-radius:8px;letter-spacing:0.4px;">
                View Full Application &rarr;
              </a>
            </td>
          </tr>
        </table>

      </td>
    </tr>

    {{-- ===== FOOTER ===== --}}
    <tr>
      <td style="background:#1a1a2e;border-radius:0 0 14px 14px;padding:24px 40px;">
        <table width="100%" cellpadding="0" cellspacing="0" border="0">
          <tr>
            <td style="font-size:13px;color:#9ca3af;line-height:2.0;">
              @if(!empty($company->address))📍 {{ $company->address }}<br>@endif
              @if(!empty($company->phone1))📞 {{ $company->phone1 }}<br>@endif
              @if(!empty($company->email))✉️ {{ $company->email }}@endif
            </td>
            <td align="right" valign="top">
              @if(!empty($company->f_link))
                <a href="{{ $company->f_link }}" style="display:inline-block;margin-left:8px;background:rgba(255,255,255,0.1);border-radius:50%;width:32px;height:32px;line-height:32px;text-align:center;text-decoration:none;font-size:14px;">f</a>
              @endif
            </td>
          </tr>
          <tr>
            <td colspan="2" style="padding-top:16px;border-top:1px solid rgba(255,255,255,0.08);">
              <p style="margin:0;font-size:12px;color:#6b7280;text-align:center;">
                &copy; {{ date('Y') }} <strong style="color:#9ca3af;">{{ $company->name ?? 'TAM' }}</strong>. All rights reserved.
                @if(!empty($company->tagline))&nbsp;&middot;&nbsp; <em>{{ $company->tagline }}</em>@endif
              </p>
            </td>
          </tr>
        </table>
      </td>
    </tr>

    {{-- ===== TINY DISCLAIMER ===== --}}
    <tr>
      <td align="center" style="padding:16px 0 0;">
        <p style="margin:0;font-size:11px;color:#b0b8cc;">This is an automated notification. Please do not reply to this email.</p>
      </td>
    </tr>

  </table>
</td></tr>
</table>

</body>
</html>
