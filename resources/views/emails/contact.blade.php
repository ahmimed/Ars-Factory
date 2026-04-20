<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau message — ARS Factory</title>
</head>
<body style="margin:0;padding:0;background:#f0f2f5;font-family:'Inter',Arial,sans-serif;color:#1a1a2e;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background:#f0f2f5;padding:40px 20px;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="max-width:600px;width:100%;background:#ffffff;border-radius:16px;overflow:hidden;box-shadow:0 8px 32px rgba(0,0,0,.10);">

                    <!-- Header -->
                    <tr>
                        <td style="background:#0a0a0a;padding:32px 40px;text-align:center;">
                            <p style="margin:0;font-family:Georgia,serif;font-size:28px;font-weight:700;color:#ffffff;letter-spacing:1px;">
                                <span style="color:#d4af37;">ARS</span> Factory
                            </p>
                            <p style="margin:8px 0 0;font-size:11px;letter-spacing:3px;color:rgba(255,255,255,.45);text-transform:uppercase;">
                                Rénovation &amp; Design — Tanger
                            </p>
                        </td>
                    </tr>

                    <!-- Gold accent line -->
                    <tr>
                        <td style="height:3px;background:linear-gradient(90deg,#d4af37,#e6c654,#d4af37);"></td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="padding:40px 40px 32px;">
                            <p style="margin:0 0 8px;font-size:11px;letter-spacing:3px;text-transform:uppercase;color:#d4af37;font-weight:600;">
                                Formulaire de contact
                            </p>
                            <h1 style="margin:0 0 28px;font-family:Georgia,serif;font-size:26px;font-weight:600;color:#1a1a2e;line-height:1.2;">
                                Nouveau message reçu
                            </h1>

                            <!-- Sender info -->
                            <table width="100%" cellpadding="0" cellspacing="0" style="background:#f8f9fa;border-radius:10px;margin-bottom:24px;overflow:hidden;border:1px solid #e8e8e8;">
                                <tr>
                                    <td style="padding:12px 20px;border-bottom:1px solid #e8e8e8;">
                                        <span style="font-size:10px;letter-spacing:2px;text-transform:uppercase;color:#d4af37;font-weight:600;display:block;margin-bottom:4px;">Expéditeur</span>
                                        <span style="font-size:15px;font-weight:600;color:#1a1a2e;">{{ $senderName }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:12px 20px;">
                                        <span style="font-size:10px;letter-spacing:2px;text-transform:uppercase;color:#d4af37;font-weight:600;display:block;margin-bottom:4px;">Email</span>
                                        <a href="mailto:{{ $senderEmail }}" style="font-size:15px;color:#1a1a2e;text-decoration:none;">{{ $senderEmail }}</a>
                                    </td>
                                </tr>
                            </table>

                            <!-- Message -->
                            <p style="margin:0 0 10px;font-size:10px;letter-spacing:2px;text-transform:uppercase;color:#d4af37;font-weight:600;">Message</p>
                            <div style="background:#f8f9fa;border-left:4px solid #d4af37;border-radius:0 10px 10px 0;padding:20px 24px;margin-bottom:32px;">
                                <p style="margin:0;font-size:15px;line-height:1.75;color:#444;white-space:pre-line;">{{ $senderMessage }}</p>
                            </div>

                            <!-- Reply CTA -->
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td align="center">
                                        <a href="mailto:{{ $senderEmail }}"
                                           style="display:inline-block;padding:14px 32px;background:#d4af37;color:#000;font-size:13px;font-weight:700;text-decoration:none;border-radius:40px;letter-spacing:1px;text-transform:uppercase;">
                                            Répondre à {{ $senderName }}
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background:#f8f9fa;padding:24px 40px;border-top:1px solid #e8e8e8;text-align:center;">
                            <p style="margin:0;font-size:12px;color:#aaa;line-height:1.6;">
                                Ce message a été envoyé depuis le formulaire de contact de<br>
                                <strong style="color:#888;">arsfactory.com</strong>
                            </p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>
</html>
