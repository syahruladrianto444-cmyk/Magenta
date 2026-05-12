<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kode Verifikasi Login</title>
</head>

<body
    style="margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f4f5;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0"
        style="max-width: 520px; margin: 40px auto;">
        <tr>
            <td
                style="background: linear-gradient(135deg, #DC2626, #991B1B); padding: 32px 24px; text-align: center; border-radius: 16px 16px 0 0;">
                <h1 style="color: #ffffff; margin: 0; font-size: 24px; font-weight: 700; letter-spacing: 1px;">
                    🔐 MAGENTA
                </h1>
                <p style="color: rgba(255,255,255,0.85); margin: 8px 0 0; font-size: 14px;">
                    Verifikasi Login Admin Panel
                </p>
            </td>
        </tr>
        <tr>
            <td
                style="background-color: #ffffff; padding: 32px 24px; border-radius: 0 0 16px 16px; box-shadow: 0 4px 24px rgba(0,0,0,0.08);">
                <p style="color: #374151; font-size: 15px; margin: 0 0 16px; line-height: 1.6;">
                    Halo <strong>{{ $userName }}</strong>,
                </p>
                <p style="color: #374151; font-size: 15px; margin: 0 0 24px; line-height: 1.6;">
                    Kami mendeteksi login dari perangkat atau lokasi baru. Gunakan kode berikut untuk memverifikasi
                    identitas Anda:
                </p>

                <!-- OTP Code -->
                <div style="text-align: center; margin: 24px 0;">
                    <div
                        style="display: inline-block; background: linear-gradient(135deg, #FEF2F2, #FEE2E2); border: 2px dashed #DC2626; border-radius: 12px; padding: 20px 40px;">
                        <span
                            style="font-size: 36px; font-weight: 800; color: #DC2626; letter-spacing: 8px; font-family: 'Courier New', monospace;">
                            {{ $otp }}
                        </span>
                    </div>
                </div>

                <p style="color: #6B7280; font-size: 13px; text-align: center; margin: 16px 0 24px;">
                    ⏱️ Kode ini berlaku selama <strong>5 menit</strong>
                </p>

                <!-- Device Info -->
                <div style="background-color: #F9FAFB; border-radius: 8px; padding: 16px; border: 1px solid #E5E7EB;">
                    <p
                        style="color: #6B7280; font-size: 12px; margin: 0 0 8px; font-weight: 600; text-transform: uppercase;">
                        📍 Detail Login
                    </p>
                    <table style="width: 100%; font-size: 13px; color: #4B5563;">
                        <tr>
                            <td style="padding: 4px 0; font-weight: 600; width: 80px;">IP:</td>
                            <td style="padding: 4px 0;">{{ $ipAddress }}</td>
                        </tr>
                        <tr>
                            <td style="padding: 4px 0; font-weight: 600;">Browser:</td>
                            <td style="padding: 4px 0; word-break: break-all;">{{ Str::limit($userAgent, 80) }}</td>
                        </tr>
                        <tr>
                            <td style="padding: 4px 0; font-weight: 600;">Waktu:</td>
                            <td style="padding: 4px 0;">{{ now()->timezone('Asia/Jakarta')->format('d M Y, H:i') }} WIB
                            </td>
                        </tr>
                    </table>
                </div>

                <hr style="border: none; border-top: 1px solid #E5E7EB; margin: 24px 0;">

                <p style="color: #9CA3AF; font-size: 12px; margin: 0; line-height: 1.5; text-align: center;">
                    Jika Anda tidak melakukan login ini, segera hubungi administrator sistem.
                    Jangan bagikan kode ini kepada siapapun.
                </p>
            </td>
        </tr>
        <tr>
            <td style="text-align: center; padding: 16px;">
                <p style="color: #9CA3AF; font-size: 11px; margin: 0;">
                    © {{ date('Y') }} PT Magenta Jaya Makmur. All rights reserved.
                </p>
            </td>
        </tr>
    </table>
</body>

</html>