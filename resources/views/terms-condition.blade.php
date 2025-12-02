<!DOCTYPE html>
<html lang="en" x-data="{ darkMode: true }"
      x-init="darkMode = JSON.parse(localStorage.getItem('theme')) ??
              window.matchMedia('(prefers-color-scheme: dark)').matches;
              $watch('darkMode', val => localStorage.setItem('theme', JSON.stringify(val)))"
      :class="darkMode ? 'dark' : ''">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>NN Wallet – Terms & Conditions</title>

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

    <h2 class="text-3xl font-bold mb-6">Terms & Conditions</h2>
    <p class="text-gray-600 dark:text-gray-400 mb-10">Last Updated: 2 December 2025</p>

    <!-- CARD -->
    <div class="bg-white dark:bg-[#1A1C23] border border-gray-300 dark:border-gray-700
                rounded-xl p-6 md:p-10 shadow-lg dark:shadow-xl transition">

        <div class="space-y-8 leading-relaxed">

            <!-- SECTION -->
            <div>
                <h3 class="text-xl font-semibold mb-2">1. Acceptance of Terms</h3>
                <p>By accessing or using NN Wallet, you agree to comply with these Terms & Conditions.
                    If you do not agree, discontinue using the app.</p>
            </div>

            <div>
                <h3 class="text-xl font-semibold mb-2">2. About the Service</h3>
                <p>NN Wallet is a non-custodial cryptocurrency wallet that allows users to manage Bitcoin
                    and other digital assets. You are solely responsible for managing your private keys and seed phrase.</p>
            </div>

            <div>
                <h3 class="text-xl font-semibold mb-2">3. Non-Custodial Nature</h3>
                <p>NN Wallet does not store, access, or recover your private keys or recovery phrases.
                    Losing your seed phrase may result in permanent loss of access to your assets.</p>
            </div>

            <div>
                <h3 class="text-xl font-semibold mb-2">4. User Responsibilities</h3>
                <ul class="list-disc pl-5 mt-2 space-y-1">
                    <li>You must safeguard your device and recovery phrase.</li>
                    <li>You must comply with local cryptocurrency laws.</li>
                    <li>You must not use NN Wallet for illegal activities.</li>
                    <li>You are responsible for verifying addresses before sending funds.</li>
                </ul>
            </div>

            <div>
                <h3 class="text-xl font-semibold mb-2">5. Blockchain Transactions</h3>
                <p>All cryptocurrency transactions are irreversible. NN Wallet cannot cancel, modify, or refund any blockchain transaction.</p>
            </div>

            <div>
                <h3 class="text-xl font-semibold mb-2">6. Fees</h3>
                <p>NN Wallet does not charge service fees. Blockchain network fees (mining fees) are paid to network validators, not to NN Wallet.</p>
            </div>

            <div>
                <h3 class="text-xl font-semibold mb-2">7. Third-Party Services</h3>
                <p>NN Wallet may integrate third-party APIs (such as price feeds or notifications).
                    We are not responsible for any errors, downtime, or data handled by these services.</p>
            </div>

            <div>
                <h3 class="text-xl font-semibold mb-2">8. Prohibited Activities</h3>
                <ul class="list-disc pl-5 mt-2 space-y-1">
                    <li>Fraud or money laundering</li>
                    <li>Unauthorized access attempts</li>
                    <li>Redistribution of the app without permission</li>
                    <li>Use of bots or automated systems</li>
                </ul>
            </div>

            <div>
                <h3 class="text-xl font-semibold mb-2">9. Disclaimer of Liability</h3>
                <p>NN Wallet is provided “as is” without warranties of any kind.
                    We are not liable for financial losses, transaction errors, or device breaches
                    caused by negligence, malware, or user error.</p>
            </div>

            <div>
                <h3 class="text-xl font-semibold mb-2">10. Limitation of Responsibility</h3>
                <p>We are not responsible for:
                    - loss of funds due to incorrect addresses,
                    - forgotten seed phrases,
                    - third-party hacks,
                    - blockchain delays or network issues.</p>
            </div>

            <div>
                <h3 class="text-xl font-semibold mb-2">11. App Updates</h3>
                <p>We may introduce new features, remove features, or update the app without prior notice.</p>
            </div>

            <div>
                <h3 class="text-xl font-semibold mb-2">12. Intellectual Property</h3>
                <p>All logos, design assets, UI components, and content belong to NN Wallet and
                    may not be copied or used without permission.</p>
            </div>

            <div>
                <h3 class="text-xl font-semibold mb-2">13. Account Termination</h3>
                <p>We may restrict access to the app if a user violates laws or these Terms.</p>
            </div>

            <div>
                <h3 class="text-xl font-semibold mb-2">14. Governing Law</h3>
                <p>These Terms are governed by applicable digital asset regulations and the laws of your jurisdiction.</p>
            </div>

            <div>
                <h3 class="text-xl font-semibold mb-2">15. Changes to Terms</h3>
                <p>We may revise these Terms at any time. Continued use of the app signifies acceptance.</p>
            </div>

            <div>
                <h3 class="text-xl font-semibold mb-2">16. Contact Information</h3>
                <p>For legal or support inquiries, contact us at:</p>
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
