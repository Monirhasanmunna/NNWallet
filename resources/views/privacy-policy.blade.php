<!DOCTYPE html>
<html lang="en" x-data="{ darkMode: true }"
      x-init="darkMode = JSON.parse(localStorage.getItem('theme')) ??
              window.matchMedia('(prefers-color-scheme: dark)').matches;
              $watch('darkMode', val => localStorage.setItem('theme', JSON.stringify(val)))"
      :class="darkMode ? 'dark' : ''">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>NN Wallet – Privacy Policy</title>

    <!-- TailwindCSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>

<body class="bg-gray-100 text-gray-800 dark:bg-[#0E0F14] dark:text-gray-200 transition-colors duration-300">

<!-- HEADER -->
<header
    class="w-full bg-white/80 dark:bg-[#111318]/80 backdrop-blur-md sticky top-0 z-50 shadow-sm dark:shadow-none">
    <div class="max-w-4xl mx-auto px-5 py-4 flex items-center justify-between">

        <!-- Left Logo -->
        <div class="flex items-center gap-2">
            <img src="https://dummyimage.com/40x40/0d9488/ffffff&text=N"
                 class="w-10 h-10 rounded-lg" alt="NN Wallet Logo">
            <h1 class="text-xl font-semibold">NN Wallet</h1>
        </div>
    </div>
</header>

<!-- MAIN CONTENT -->
<section class="max-w-4xl mx-auto px-5 py-10">

    <h2 class="text-3xl font-bold mb-6">Privacy Policy</h2>
    <p class="text-gray-600 dark:text-gray-400 mb-10">Last Updated: 2 December 2025</p>

    <!-- CARD -->
    <div class="bg-white dark:bg-[#1A1C23] border border-gray-300 dark:border-gray-700
                rounded-xl p-6 md:p-10 shadow-lg dark:shadow-xl transition">

        <div class="space-y-8 leading-relaxed">

            <!-- SECTION 1 -->
            <div>
                <h3 class="text-xl font-semibold mb-2">1. About NN Wallet</h3>
                <p>NN Wallet is a non-custodial cryptocurrency wallet supporting Bitcoin and other digital assets.
                    You control your private keys; we never store them.</p>
            </div>

            <!-- SECTION 2 -->
            <div>
                <h3 class="text-xl font-semibold mb-2">2. Information We Collect</h3>
                <p class="mb-3"><strong>Information You Provide:</strong> email, display name, support messages.</p>
                <p class="mb-3"><strong>Automatically:</strong> device info, crash logs, region (not GPS).</p>
                <p><strong>Blockchain Data:</strong> Public blockchain info like addresses & TXIDs.</p>
            </div>

            <!-- SECTION 3 -->
            <div>
                <h3 class="text-xl font-semibold mb-2">3. What We Do NOT Collect</h3>
                <ul class="list-disc pl-5 mt-2 space-y-1">
                    <li>Private keys</li>
                    <li>Seed phrases</li>
                    <li>Wallet passwords / PINs</li>
                    <li>GPS location</li>
                    <li>Contacts / photos / SMS</li>
                    <li>Government IDs or biometrics</li>
                </ul>
            </div>

            <!-- SECTION 4 -->
            <div>
                <h3 class="text-xl font-semibold mb-2">4. How We Use Your Information</h3>
                <ul class="list-disc pl-5 mt-2 space-y-1">
                    <li>Improve performance</li>
                    <li>Notifications (optional)</li>
                    <li>Support communication</li>
                    <li>Security & analytics</li>
                </ul>
            </div>

            <!-- SECTION 5 -->
            <div>
                <h3 class="text-xl font-semibold mb-2">5. Third-Party Services</h3>
                <p>We may use Firebase for notifications and crash analytics.
                    No private keys or wallet data are ever shared.</p>
            </div>

            <!-- SECTION 6 -->
            <div>
                <h3 class="text-xl font-semibold mb-2">6. Data Storage & Security</h3>
                <p class="mb-3"><strong>On Device:</strong> keys stored via secure device encryption.</p>
                <p><strong>On Server:</strong> only minimal analytics (non-sensitive).</p>
            </div>

            <!-- SECTION 7 -->
            <div>
                <h3 class="text-xl font-semibold mb-2">7. Children’s Privacy</h3>
                <p>NN Wallet is not intended for individuals under 18.</p>
            </div>

            <!-- SECTION 8 -->
            <div>
                <h3 class="text-xl font-semibold mb-2">8. Your Rights</h3>
                <p>Request data deletion, access, or opt-out via
                    <span class="text-green-500 font-semibold">support@nnwallet.com</span>.
                </p>
            </div>

            <!-- SECTION 9 -->
            <div>
                <h3 class="text-xl font-semibold mb-2">9. International Data Transfers</h3>
                <p>We comply with GDPR/CCPA for cross-border handling of analytics data.</p>
            </div>

            <!-- SECTION 10 -->
            <div>
                <h3 class="text-xl font-semibold mb-2">10. Security Practices</h3>
                <p>We use device encryption, secure key storage, TLS, and regular updates.</p>
            </div>

            <!-- SECTION 11 -->
            <div>
                <h3 class="text-xl font-semibold mb-2">11. Updates</h3>
                <p>This policy may change and will include an updated revision date.</p>
            </div>

            <!-- SECTION 12 -->
            <div>
                <h3 class="text-xl font-semibold mb-2">12. Contact Us</h3>
                <p>Email:</p>
                <p class="text-green-500 font-semibold">support@nnwallet.com</p>
            </div>

        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="text-center py-6 text-gray-600 dark:text-gray-400 text-sm">
    © 2025 NN Wallet — All Rights Reserved.
</footer>

</body>
</html>
