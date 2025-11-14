<script>
// Calculator Functions
        function openCalculator(type) {
            const calculators = {
                'duct': {
                    title: 'Tính Độ Dày Cách Nhiệt Ống Gió',
                    description: 'Công cụ tính toán cách nhiệt cho hệ thống HVAC'
                },
                'hotwater': {
                    title: 'Tính Tổn Thất Nhiệt Đường Ống Nước Nóng', 
                    description: 'Tính toán tổn thất nhiệt và độ dày cách nhiệt kinh tế'
                },
                'tanks': {
                    title: 'Tính Tổn Thất Nhiệt Trên Tanks',
                    description: 'Cách nhiệt cho bồn chứa và tanks công nghiệp'
                },
                'chiller': {
                    title: 'Tính Độ Dày Cách Nhiệt Ống Chiller',
                    description: 'Chuyên biệt cho hệ thống chiller và làm lạnh'
                }
            };

            const calc = calculators[type];
            if (calc) {
                // Create modal for calculator
                const modal = document.createElement('div');
                modal.className = 'calc-modal';
                modal.innerHTML = `
                    <div class="calc-modal-content">
                        <div class="calc-modal-header">
                            <h3>${calc.title}</h3>
                            <button class="calc-close" onclick="closeCalculator()">&times;</button>
                        </div>
                        <div class="calc-modal-body">
                            <p>${calc.description}</p>
                            <div class="calc-coming-soon">
                                <i class="fas fa-tools"></i>
                                <h4>Công cụ tính toán đang được phát triển</h4>
                                <p>Chúng tôi đang hoàn thiện công cụ tính toán chuyên nghiệp này. Hiện tại, vui lòng liên hệ với đội ngũ kỹ sư để được hỗ trợ tính toán cụ thể.</p>
                                <div class="calc-contact-options">
                                    <a href="tel:0973098338" class="btn btn-primary">
                                        <i class="fas fa-phone"></i>
                                        Gọi tư vấn: 0973.098.338
                                    </a>
                                    <a href="mailto:technical@3igreen.com.vn" class="btn btn-outline">
                                        <i class="fas fa-envelope"></i>
                                        Email kỹ thuật
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                
                document.body.appendChild(modal);
                document.body.style.overflow = 'hidden';
                
                // Add styles for modal
                if (!document.querySelector('#calc-modal-styles')) {
                    const styles = document.createElement('style');
                    styles.id = 'calc-modal-styles';
                    styles.textContent = `
                        .calc-modal {
                            position: fixed;
                            top: 0;
                            left: 0;
                            width: 100%;
                            height: 100%;
                            background: rgba(0, 0, 0, 0.8);
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            z-index: 10001;
                            padding: 2rem;
                            backdrop-filter: blur(5px);
                        }
                        
                        .calc-modal-content {
                            background: white;
                            border-radius: 20px;
                            max-width: 600px;
                            width: 100%;
                            max-height: 90vh;
                            overflow-y: auto;
                            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
                            animation: modalSlideIn 0.3s ease-out;
                        }
                        
                        @keyframes modalSlideIn {
                            from {
                                opacity: 0;
                                transform: translateY(-30px) scale(0.9);
                            }
                            to {
                                opacity: 1;
                                transform: translateY(0) scale(1);
                            }
                        }
                        
                        .calc-modal-header {
                            padding: 2rem 2rem 1rem 2rem;
                            border-bottom: 1px solid #eee;
                            display: flex;
                            justify-content: space-between;
                            align-items: center;
                        }
                        
                        .calc-modal-header h3 {
                            color: var(--primary-color);
                            font-size: 1.5rem;
                            font-weight: 700;
                            margin: 0;
                        }
                        
                        .calc-close {
                            background: none;
                            border: none;
                            font-size: 2rem;
                            color: var(--text-light);
                            cursor: pointer;
                            padding: 0;
                            width: 40px;
                            height: 40px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            border-radius: 50%;
                            transition: all 0.3s ease;
                        }
                        
                        .calc-close:hover {
                            background: var(--bg-section);
                            color: var(--primary-color);
                        }
                        
                        .calc-modal-body {
                            padding: 2rem;
                        }
                        
                        .calc-modal-body p {
                            color: var(--text-light);
                            margin-bottom: 2rem;
                        }
                        
                        .calc-coming-soon {
                            text-align: center;
                            padding: 2rem;
                            background: var(--bg-section);
                            border-radius: 15px;
                        }
                        
                        .calc-coming-soon i {
                            font-size: 3rem;
                            color: var(--accent-color);
                            margin-bottom: 1rem;
                        }
                        
                        .calc-coming-soon h4 {
                            color: var(--primary-color);
                            font-size: 1.3rem;
                            font-weight: 600;
                            margin-bottom: 1rem;
                        }
                        
                        .calc-coming-soon p {
                            color: var(--text-light);
                            line-height: 1.6;
                            margin-bottom: 2rem;
                        }
                        
                        .calc-contact-options {
                            display: flex;
                            gap: 1rem;
                            justify-content: center;
                            flex-wrap: wrap;
                        }
                        
                        .calc-contact-options .btn {
                            padding: 0.8rem 1.5rem;
                            font-size: 0.9rem;
                        }
                        
                        .calc-contact-options .btn-outline {
                            color: var(--primary-color);
                            border-color: var(--primary-color);
                        }
                        
                        @media (max-width: 768px) {
                            .calc-modal {
                                padding: 1rem;
                            }
                            
                            .calc-modal-header,
                            .calc-modal-body {
                                padding: 1.5rem;
                            }
                            
                            .calc-contact-options {
                                flex-direction: column;
                                align-items: center;
                            }
                            
                            .calc-contact-options .btn {
                                width: 100%;
                                max-width: 250px;
                            }
                        }
                    `;
                    document.head.appendChild(styles);
                }
            }
        }

        function closeCalculator() {
            const modal = document.querySelector('.calc-modal');
            if (modal) {
                modal.style.animation = 'modalSlideOut 0.3s ease-in forwards';
                setTimeout(() => {
                    document.body.removeChild(modal);
                    document.body.style.overflow = 'visible';
                }, 300);
            }
        }

        // Add modal slide out animation
        const modalStyles = document.createElement('style');
        modalStyles.textContent += `
            @keyframes modalSlideOut {
                from {
                    opacity: 1;
                    transform: translateY(0) scale(1);
                }
                to {
                    opacity: 0;
                    transform: translateY(-30px) scale(0.9);
                }
            }
        `;
        document.head.appendChild(modalStyles);
</script>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <title>Gói Đỡ PU Foam Cách Nhiệt, Chịu Lực Cao - 3igreen | Tiết Kiệm 70% Thời Gian Thi Công</title>
    <meta name="description" content="3igreen chuyên sản xuất gói đỡ PU Foam chất lượng cao với hệ số dẫn nhiệt thấp, khả năng chịu lực tốt. Giải pháp tối ưu cho hệ thống lạnh, chiller, điều hòa không khí. Tiết kiệm 70% thời gian thi công.">
    <meta name="keywords" content="gói đỡ pu foam, gói đỡ ống chiller, gói đỡ cách nhiệt, vật liệu xanh 3i, 3igreen, pu foam, pu foam đế vuông, pu foam đế tròn, kingspipe">

    <!-- Additional SEO -->
    <meta name="author" content="3igreen">
    <meta name="robots" content="index, follow">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://3igreen.com.vn/">
    <meta property="og:title" content="Gói Đỡ PU Foam Cách Nhiệt - 3igreen">
    <meta property="og:description" content="Giải pháp gối đỡ PU Foam chuyên nghiệp cho hệ thống HVAC. Tiết kiệm 70% thời gian thi công.">
    <meta property="og:image" content="https://3igreen.com.vn/og-image.jpg">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://3igreen.com.vn/">
    <meta property="twitter:title" content="Gói Đỡ PU Foam Cách Nhiệt - 3igreen">
    <meta property="twitter:description" content="Giải pháp gối đỡ PU Foam chuyên nghiệp cho hệ thống HVAC.">
    <meta property="twitter:image" content="https://3igreen.com.vn/og-image.jpg">

    <!-- Apple Mobile Web App -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="3igreen">

    <!-- Microsoft -->
    <meta name="msapplication-TileColor" content="#94C842">
    <meta name="theme-color" content="#94C842">

    <!-- Performance: Preconnect to external resources -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="dns-prefetch" href="https://unpkg.com">

    <!-- Performance: Preload critical fonts -->
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" as="style">
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&subset=vietnamese&display=swap" as="style">

    <!-- External Stylesheets -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&subset=vietnamese&display=swap" rel="stylesheet">

    <!-- Browser Compatibility CSS -->
    <link href="browser-compatibility.css" rel="stylesheet">

    <!-- Browser Polyfills (load early for IE11 and old browsers) -->
    <script src="browser-polyfills.js"></script>

    <style>
        :root {
            /* Modern Premium Industrial Color Palette */
            --primary-green: #94C842;           /* Industrial Green */
            --primary-green-dark: #6B9631;      /* Dark Green */
            --primary-green-light: #A8D657;     /* Light Green */

            --navy-dark: #0A1628;               /* Deep Navy - Premium Dark */
            --navy: #1A2332;                    /* Navy - Dark BG */
            --navy-light: #2C3E50;              /* Light Navy */

            --white: #FFFFFF;                   /* Pure White */
            --off-white: #F8F9FA;               /* Off White - Light BG */
            --light-gray: #E9ECEF;              /* Light Gray */

            --text-primary: #0A1628;            /* Primary Text - Dark Navy */
            --text-secondary: #2D3748;          /* Secondary Text - Gray (tối hơn để dễ đọc) */
            --text-muted: #718096;              /* Muted Text (tối hơn để dễ đọc) */

            --accent-gold: #FFD93D;             /* Premium Gold Accent */
            --accent-orange: #FF6B35;           /* Energy Orange */

            /* Industrial Shadows - Elevated, Premium */
            --shadow-sm: 0 2px 8px rgba(10, 22, 40, 0.08);
            --shadow-md: 0 4px 16px rgba(10, 22, 40, 0.12);
            --shadow-lg: 0 8px 32px rgba(10, 22, 40, 0.16);
            --shadow-xl: 0 16px 48px rgba(10, 22, 40, 0.20);
            --shadow-2xl: 0 24px 64px rgba(10, 22, 40, 0.24);

            /* Geometric Border Radius - Less rounded, more industrial */
            --radius-sm: 4px;
            --radius-md: 8px;
            --radius-lg: 12px;
            --radius-xl: 16px;

            /* Professional Transitions */
            --transition-fast: 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            --transition-base: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            --transition-slow: 0.5s cubic-bezier(0.4, 0, 0.2, 1);

            /* Typography Scale - Industrial Bold */
            --font-primary: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            --font-display: 'Poppins', sans-serif;

            /* Spacing System */
            --space-1: 0.25rem;
            --space-2: 0.5rem;
            --space-3: 0.75rem;
            --space-4: 1rem;
            --space-6: 1.5rem;
            --space-8: 2rem;
            --space-12: 3rem;
            --space-16: 4rem;
            --space-24: 6rem;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            overflow-x: hidden;
            width: 100%;
            max-width: 100vw;
            position: relative;
        }

        body {
            font-family: var(--font-primary);
            line-height: 1.6;
            color: var(--text-primary);
            background: var(--white);
            overflow-x: hidden;
            width: 100%;
            max-width: 100vw;
            position: relative;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Modern Premium Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: var(--light-gray);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary-green);
            border-radius: var(--radius-sm);
            border: 2px solid var(--light-gray);
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--primary-green-dark);
        }

        /* Industrial Typography */
        h1, h2, h3, h4, h5, h6 {
            font-family: var(--font-display);
            font-weight: 700;
            line-height: 1.2;
            color: var(--navy-dark);
            letter-spacing: -0.02em;
        }

        h1 {
            font-size: clamp(2.5rem, 5vw, 4.5rem);
            font-weight: 800;
        }

        h2 {
            font-size: clamp(2rem, 4vw, 3.5rem);
        }

        h3 {
            font-size: clamp(1.5rem, 3vw, 2.5rem);
        }

        p {
            font-size: 1.125rem;
            line-height: 1.8;
            color: var(--text-secondary);
        }

        a {
            text-decoration: none;
            color: inherit;
            transition: var(--transition-base);
        }

        img {
            max-width: 100%;
            height: auto;
            display: block;
        }

        /* Premium Loading Screen */
        .loading {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--navy-dark);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.6s ease, visibility 0.6s ease;
        }

        .loading.hidden {
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
        }

        .loader {
            width: 60px;
            height: 60px;
            border: 3px solid var(--navy-light);
            border-top: 3px solid var(--primary-green);
            border-radius: 50%;
            animation: spin 1s cubic-bezier(0.4, 0, 0.2, 1) infinite;
            margin-bottom: var(--space-6);
        }

        .loading-text {
            color: var(--white);
            font-size: 1rem;
            font-weight: 600;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            opacity: 0.8;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Container System */
        .container {
            width: 100%;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 var(--space-6);
        }

        @media (max-width: 768px) {
            .container {
                padding: 0 var(--space-4);
            }
        }

        /* Utility Classes */
        .section {
            padding: var(--space-24) 0;
            width: 100%;
            max-width: 100vw;
            overflow-x: hidden;
        }

        .section-dark {
            background: var(--navy-dark);
            color: var(--white);
        }

        .section-light {
            background: var(--off-white);
        }

        .text-center {
            text-align: center;
        }

        /* Premium Scroll Progress Bar */
        .scroll-progress {
            position: fixed;
            top: 0;
            left: 0;
            width: 0%;
            height: 3px;
            background: linear-gradient(90deg, var(--primary-green), var(--accent-gold));
            z-index: 10000;
            transition: width 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Premium Industrial Header */
        header {
            position: fixed;
            top: 0;
            width: 100%;
            max-width: 100vw;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--light-gray);
            padding: var(--space-4) 0;
            z-index: 1000;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        header.scrolled {
            background: rgba(255, 255, 255, 0.98);
            box-shadow: var(--shadow-md);
            padding: var(--space-3) 0;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 var(--space-6);
        }

        /* Industrial Logo */
        .logo {
            font-family: var(--font-display);
            font-size: 1.75rem;
            font-weight: 800;
            color: var(--navy-dark);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: var(--space-3);
            transition: var(--transition-base);
            letter-spacing: -0.02em;
        }

        .logo:hover {
            transform: translateX(4px);
        }

        .logo i {
            font-size: 2rem;
            color: var(--primary-green);
            padding: var(--space-2);
            background: rgba(148, 200, 66, 0.1);
            border-radius: var(--radius-md);
        }

        .logo-text {
            color: var(--navy-dark);
        }

        /* Premium Navigation Menu */
        .nav-menu {
            display: flex;
            list-style: none;
            gap: var(--space-8);
            align-items: center;
        }

        .nav-menu a {
            text-decoration: none;
            color: var(--text-secondary);
            font-weight: 500;
            font-size: 0.95rem;
            transition: var(--transition-base);
            position: relative;
            padding: var(--space-2) 0;
            letter-spacing: 0.01em;
        }

        .nav-menu a:hover {
            color: var(--navy-dark);
        }

        .nav-menu a::before {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background: var(--primary-green);
            transition: width 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .nav-menu a:hover::before {
            width: 100%;
        }

        /* Premium CTA Button */
        .nav-cta {
            background: var(--primary-green);
            color: var(--white);
            padding: var(--space-3) var(--space-6);
            border-radius: var(--radius-md);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: var(--shadow-sm);
            display: inline-flex;
            align-items: center;
            gap: var(--space-2);
        }

        .nav-cta:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
            background: var(--primary-green-dark);
        }

        .nav-cta i {
            font-size: 1rem;
        }

        /* Mobile Menu Toggle */
        .mobile-menu {
            display: none;
            cursor: pointer;
            font-size: 1.5rem;
            color: var(--navy-dark);
            padding: var(--space-2);
            transition: var(--transition-base);
        }

        .mobile-menu:hover {
            color: var(--primary-green);
        }

        /* Hero Section */
        /* Premium Industrial Hero */
        .hero {
            min-height: 100vh;
            width: 100%;
            max-width: 100vw;
            display: flex;
            align-items: center;
            background: linear-gradient(135deg, var(--navy-dark) 0%, var(--navy) 100%);
            position: relative;
            overflow: hidden;
            overflow-x: hidden;
            padding: calc(var(--space-24) + 80px) 0 var(--space-24);
        }

        /* Hero Background Slider */
        .hero-slider {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
        }

        .hero-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            opacity: 0;
            transition: opacity 1.5s ease-in-out;
        }

        /* Smooth slider animation with zoom effect */
        @keyframes slideZoom {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
            100% {
                transform: scale(1);
            }
        }

        .hero-slide.active {
            opacity: 1;
            animation: slideZoom 10s ease-in-out infinite;
        }

        /* Hero Overlay for Better Text Readability */
        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                135deg,
                rgba(13, 27, 42, 0.92) 0%,
                rgba(27, 38, 59, 0.88) 50%,
                rgba(13, 27, 42, 0.85) 100%
            );
            z-index: 1;
            pointer-events: none;
        }

        /* Industrial Grid Pattern */
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image:
                linear-gradient(rgba(148, 200, 66, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(148, 200, 66, 0.03) 1px, transparent 1px);
            background-size: 50px 50px;
            opacity: 0.5;
            z-index: 1;
            pointer-events: none;
        }

        /* Diagonal Accent Cut */
        .hero::after {
            content: '';
            position: absolute;
            bottom: -100px;
            right: -200px;
            width: 800px;
            height: 800px;
            background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-light) 100%);
            opacity: 0.08;
            border-radius: 50%;
            filter: blur(100px);
            animation: float-blob 20s ease-in-out infinite;
            z-index: 1;
            pointer-events: none;
        }

        @keyframes float-blob {
            0%, 100% { transform: translate(0, 0) scale(1); }
            50% { transform: translate(-50px, 50px) scale(1.1); }
        }

        .hero-content {
            width: 100%;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 var(--space-6);
            display: grid;
            grid-template-columns: 1.3fr 1fr;
            gap: var(--space-16);
            align-items: center;
            position: relative;
            z-index: 2;
        }

        /* Industrial Typography - Hero */
        .hero-text h1 {
            font-family: var(--font-display);
            font-size: clamp(3rem, 6vw, 5.5rem);
            font-weight: 800;
            color: var(--white);
            margin-bottom: var(--space-6);
            line-height: 1.05;
            letter-spacing: -0.03em;
            opacity: 0;
            animation: slideInUp 0.8s cubic-bezier(0.4, 0, 0.2, 1) forwards 0.3s;
        }

        .hero-text .highlight {
            color: var(--primary-green);
            position: relative;
            display: inline-block;
        }

        .hero-text .highlight::after {
            content: '';
            position: absolute;
            bottom: 0.1em;
            left: 0;
            width: 100%;
            height: 0.15em;
            background: var(--primary-green);
            opacity: 0.3;
            z-index: -1;
        }

        .hero-text .subtitle {
            font-size: clamp(1.125rem, 2vw, 1.375rem);
            color: rgba(255, 255, 255, 0.98);
            margin-bottom: var(--space-8);
            text-shadow: 0 2px 8px rgba(0,0,0,0.3);
            font-weight: 400;
            line-height: 1.7;
            max-width: 600px;
            opacity: 0;
            animation: slideInUp 0.8s cubic-bezier(0.4, 0, 0.2, 1) forwards 0.5s;
        }

        /* Industrial Stats/Features */
        .hero-features {
            display: flex;
            flex-wrap: wrap;
            gap: var(--space-6);
            margin-bottom: var(--space-8);
            opacity: 0;
            animation: slideInUp 0.8s cubic-bezier(0.4, 0, 0.2, 1) forwards 0.7s;
        }

        .hero-feature {
            display: flex;
            align-items: center;
            gap: var(--space-3);
            background: rgba(255, 255, 255, 0.05);
            padding: var(--space-3) var(--space-4);
            border-radius: var(--radius-md);
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
        }

        .hero-feature i {
            color: var(--primary-green);
            font-size: 1.25rem;
        }

        .hero-feature span {
            color: var(--white);
            font-size: 0.95rem;
            font-weight: 500;
        }

        /* Premium CTA Buttons */
        .hero-buttons {
            display: flex;
            gap: var(--space-4);
            flex-wrap: wrap;
            opacity: 0;
            animation: slideInUp 0.8s cubic-bezier(0.4, 0, 0.2, 1) forwards 0.9s;
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Industrial Button System */
        .btn {
            padding: var(--space-4) var(--space-8);
            border: none;
            border-radius: var(--radius-md);
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: var(--space-3);
            position: relative;
            overflow: hidden;
            letter-spacing: 0.01em;
        }

        .btn i {
            font-size: 1.125rem;
        }

        .btn-primary {
            background: var(--primary-green);
            color: var(--white);
            box-shadow: var(--shadow-md);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
            background: var(--primary-green-dark);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .btn-outline {
            background: transparent;
            color: var(--white);
            border: 2px solid rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(10px);
        }

        .btn-outline:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 255, 255, 0.6);
            transform: translateY(-2px);
        }

        .btn-outline:active {
            transform: translateY(0);
        }

        .hero-visual {
            position: relative;
            opacity: 0;
            animation: slideInRight 1.2s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards 0.6s;
        }

        .floating-cards {
            position: relative;
            height: 500px;
        }

        .floating-card {
            position: absolute;
            background: var(--glass-bg);
            backdrop-filter: blur(30px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: var(--border-radius);
            padding: 2rem;
            color: var(--white);
            box-shadow: var(--shadow-lg);
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1),
                        box-shadow 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            will-change: transform;
            backface-visibility: hidden;
        }

        .floating-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-hover);
        }

        .card-1 {
            top: 0;
            right: 0;
            width: 280px;
            animation: float 6s ease-in-out infinite;
        }

        .card-2 {
            bottom: 100px;
            left: 0;
            width: 250px;
            animation: float 6s ease-in-out infinite 2s;
        }

        .card-3 {
            top: 150px;
            left: 50%;
            transform: translateX(-50%);
            width: 200px;
            animation: float 6s ease-in-out infinite 4s;
        }

        .floating-card h4 {
            font-size: 1.3rem;
            margin-bottom: 1rem;
            color: var(--accent-light);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .floating-card p {
            font-size: 0.95rem;
            opacity: 0.9;
            line-height: 1.5;
        }

        .stats {
            display: flex;
            justify-content: space-between;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 2.2rem;
            font-weight: 800;
            color: var(--accent-light);
            font-family: 'Poppins', sans-serif;
        }

        .stat-label {
            font-size: 0.85rem;
            opacity: 0.8;
            font-weight: 500;
        }

        /* Animations */
        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-60px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(60px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            25% { transform: translateY(-15px) rotate(1deg); }
            50% { transform: translateY(-5px) rotate(-0.5deg); }
            75% { transform: translateY(-20px) rotate(0.5deg); }
        }

        /* Premium Section System */
        section {
            padding: var(--space-24) 0;
            position: relative;
        }

        .section-header {
            text-align: center;
            margin-bottom: var(--space-16);
            max-width: 900px;
            margin-left: auto;
            margin-right: auto;
        }

        .section-badge {
            display: inline-flex;
            align-items: center;
            gap: var(--space-2);
            background: var(--primary-green);
            color: var(--white);
            padding: var(--space-2) var(--space-4);
            border-radius: var(--radius-md);
            font-size: 0.875rem;
            font-weight: 600;
            margin-bottom: var(--space-4);
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }

        .section-title {
            font-family: var(--font-display);
            font-size: clamp(2rem, 4vw, 3.5rem);
            font-weight: 800;
            color: var(--navy-dark);
            margin-bottom: var(--space-6);
            line-height: 1.1;
            letter-spacing: -0.02em;
        }

        .section-subtitle {
            font-size: clamp(1rem, 2vw, 1.25rem);
            color: var(--text-secondary);
            line-height: 1.7;
            max-width: 700px;
            margin: 0 auto;
        }

        /* Premium Card System */
        .card {
            background: var(--white);
            border-radius: var(--radius-lg);
            padding: var(--space-8);
            box-shadow: var(--shadow-md);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid var(--light-gray);
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-xl);
            border-color: var(--primary-green);
        }

        .card-dark {
            background: var(--navy-dark);
            color: var(--white);
            border-color: var(--navy-light);
        }

        .card-icon {
            width: 64px;
            height: 64px;
            background: rgba(148, 200, 66, 0.1);
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: var(--space-4);
            font-size: 1.75rem;
            color: var(--primary-green);
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--navy-dark);
            margin-bottom: var(--space-3);
        }

        .card-dark .card-title {
            color: var(--white);
        }

        .card-text {
            font-size: 1rem;
            color: var(--text-secondary);
            line-height: 1.7;
        }

        .card-dark .card-text {
            color: rgba(255, 255, 255, 0.8);
        }

        /* Premium Grid Systems */
        .grid-2 {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(500px, 1fr));
            gap: var(--space-8);
        }

        .grid-3 {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: var(--space-8);
        }

        .grid-4 {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: var(--space-6);
        }

        @media (max-width: 768px) {
            .grid-2, .grid-3, .grid-4 {
                grid-template-columns: 1fr;
                gap: var(--space-6);
            }
        }

        /* Stats Section - Modern Premium Industrial */
        .stats-section {
            background: linear-gradient(135deg, var(--navy-dark) 0%, var(--navy) 100%);
            color: var(--white);
            padding: var(--space-24) 0;
            margin: 0;
            position: relative;
            overflow: hidden;
        }

        .stats-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image:
                linear-gradient(rgba(148, 200, 66, 0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(148, 200, 66, 0.05) 1px, transparent 1px);
            background-size: 40px 40px;
            opacity: 0.5;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: var(--space-8);
            text-align: center;
            position: relative;
            z-index: 2;
        }

        .stat-card {
            padding: var(--space-8);
            background: rgba(255, 255, 255, 0.05);
            border-radius: var(--radius-lg);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .stat-card:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-4px);
            border-color: var(--primary-green);
        }

        .stat-card .number {
            font-family: var(--font-display);
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 800;
            margin-bottom: var(--space-3);
            color: var(--primary-green);
            letter-spacing: -0.02em;
        }

        .stat-card .label {
            font-size: 1.125rem;
            opacity: 0.9;
            line-height: 1.5;
        }

        /* Partners Logo Slider */
        .partners-section {
            background: var(--white);
            padding: var(--space-16) 0;
            overflow: hidden;
            position: relative;
        }

        .partners-section::before,
        .partners-section::after {
            content: '';
            position: absolute;
            top: 0;
            width: 200px;
            height: 100%;
            z-index: 2;
            pointer-events: none;
        }

        .partners-section::before {
            left: 0;
            background: linear-gradient(to right, rgba(255,255,255,1) 0%, rgba(255,255,255,0) 100%);
        }

        .partners-section::after {
            right: 0;
            background: linear-gradient(to left, rgba(255,255,255,1) 0%, rgba(255,255,255,0) 100%);
        }

        .partners-slider {
            display: flex;
            gap: var(--space-12);
            animation: scrollLogos 30s linear infinite;
            will-change: transform;
        }

        .partners-slider:hover {
            animation-play-state: paused;
        }

        .partner-logo {
            flex-shrink: 0;
            width: 180px;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--white);
            border-radius: var(--radius-lg);
            padding: var(--space-4);
            box-shadow: var(--shadow-sm);
            transition: all 0.3s ease;
            border: 1px solid var(--light-gray);
        }

        .partner-logo:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .partner-logo img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            filter: grayscale(100%);
            opacity: 0.7;
            transition: all 0.3s ease;
        }

        .partner-logo:hover img {
            filter: grayscale(0%);
            opacity: 1;
        }

        @keyframes scrollLogos {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(-50%);
            }
        }

        /* About Section - Modern Premium Industrial */
        .about {
            background: var(--off-white);
            position: relative;
            overflow: hidden;
        }

        .about::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 600px;
            height: 600px;
            background: var(--primary-green);
            opacity: 0.03;
            border-radius: 50%;
            filter: blur(120px);
        }

        .about-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-16);
            align-items: center;
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 100%;
        }

        .about-text h3 {
            font-family: var(--font-display);
            font-size: clamp(1.75rem, 3vw, 2.5rem);
            font-weight: 800;
            color: var(--navy-dark);
            margin-bottom: var(--space-6);
            line-height: 1.2;
            letter-spacing: -0.02em;
        }

        .about-text p {
            font-size: 1.125rem;
            color: var(--text-secondary);
            margin-bottom: var(--space-6);
            line-height: 1.8;
        }

        .about-highlights {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: var(--space-4);
            margin-top: var(--space-8);
            width: 100%;
            max-width: 100%;
        }

        .highlight-item {
            display: flex;
            align-items: flex-start;
            gap: var(--space-4);
            padding: var(--space-6);
            background: var(--white);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-sm);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid var(--light-gray);
            position: relative;
            width: 100%;
            max-width: 100%;
        }

        .highlight-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 3px;
            height: 0;
            background: var(--primary-green);
            transition: height 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .highlight-item:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
            border-color: var(--primary-green);
        }

        .highlight-item:hover::before {
            height: 100%;
        }

        .highlight-item i {
            font-size: 1.5rem;
            color: var(--primary-green);
            min-width: 36px;
            background: rgba(148, 200, 66, 0.1);
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: var(--radius-md);
        }

        .highlight-item div h5 {
            font-family: var(--font-display);
            font-size: 1.125rem;
            font-weight: 700;
            color: var(--navy-dark);
            margin-bottom: var(--space-2);
        }

        .highlight-item div p {
            font-size: 0.95rem;
            color: var(--text-secondary);
            margin: 0;
            line-height: 1.6;
        }

        .about-text {
            width: 100%;
            max-width: 100%;
        }

        .about-visual {
            position: relative;
            width: 100%;
            max-width: 100%;
        }

        .company-card {
            background: var(--white);
            border-radius: var(--radius-xl);
            padding: var(--space-12);
            box-shadow: var(--shadow-xl);
            border: 1px solid var(--light-gray);
            border: 1px solid rgba(30, 81, 40, 0.1);
            width: 100%;
            max-width: 100%;
            overflow: hidden;
        }

        .company-logo {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            color: var(--white);
            margin-bottom: 2rem;
            box-shadow: var(--shadow);
        }

        .company-info h4 {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .company-info p {
            color: var(--text-light);
            margin-bottom: 2rem;
            font-size: 1rem;
        }

        .company-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
            width: 100%;
            max-width: 100%;
        }

        .stat-card {
            text-align: center;
            padding: 1.5rem;
            background: var(--bg-light);
            border-radius: 15px;
            transition: var(--transition);
        }

        .stat-card:hover {
            background: var(--primary-color);
            color: var(--white);
            transform: translateY(-5px);
        }

        .stat-card .number {
            font-size: 2rem;
            font-weight: 800;
            color: var(--accent-color);
            font-family: 'Poppins', sans-serif;
        }

        .stat-card:hover .number {
            color: var(--accent-light);
        }

        .stat-card .label {
            font-size: 0.9rem;
            font-weight: 500;
            color: var(--text-light);
            margin-top: 0.5rem;
        }

        .stat-card:hover .label {
            color: rgba(255, 255, 255, 0.9);
        }

        /* Product Features Section */
        .features {
            position: relative;
        }

        .features::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 50%;
            height: 100%;
            background: linear-gradient(135deg, rgba(247, 127, 0, 0.05), rgba(252, 191, 73, 0.03));
            border-radius: 0 0 0 100px;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 3rem;
            margin-top: 4rem;
            position: relative;
            z-index: 2;
        }

        .feature-card {
            background: var(--white);
            border-radius: var(--radius-lg);
            padding: var(--space-8);
            box-shadow: var(--shadow-md);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid var(--light-gray);
            position: relative;
            overflow: hidden;
        }

        .feature-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: var(--primary-green);
            transform: scaleY(0);
            transform-origin: bottom;
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .feature-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-xl);
            border-color: var(--primary-green);
        }

        .feature-card:hover::after {
            transform: scaleY(1);
        }

        .feature-icon {
            width: 72px;
            height: 72px;
            background: rgba(148, 200, 66, 0.1);
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: var(--space-6);
            color: var(--primary-green);
            font-size: 2rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .feature-card:hover .feature-icon {
            transform: scale(1.1);
            background: var(--primary-green);
            color: var(--white);
        }

        .feature-card h3 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--navy-dark);
            margin-bottom: var(--space-3);
            font-family: var(--font-display);
        }

        .feature-card p {
            color: var(--text-secondary);
            line-height: 1.7;
            margin-bottom: var(--space-4);
            font-size: 1rem;
        }

        .feature-benefits {
            list-style: none;
            padding: 0;
        }

        .feature-benefits li {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            margin-bottom: 0.8rem;
            font-size: 0.95rem;
            color: var(--text-light);
        }

        .feature-benefits li i {
            color: var(--accent-color);
            font-size: 1rem;
        }

        /* Technical Specifications - Modern Premium Industrial */
        .specs {
            background: linear-gradient(135deg, var(--navy-dark) 0%, var(--navy) 100%);
            color: var(--white);
            position: relative;
            overflow: hidden;
        }

        .specs::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image:
                linear-gradient(rgba(148, 200, 66, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(148, 200, 66, 0.03) 1px, transparent 1px);
            background-size: 50px 50px;
        }

        .specs-content {
            position: relative;
            z-index: 2;
        }

        .specs-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: var(--space-8);
            margin-top: var(--space-16);
        }

        .spec-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: var(--radius-lg);
            padding: var(--space-8);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .spec-card:hover {
            transform: translateY(-4px);
            background: rgba(255, 255, 255, 0.1);
            border-color: var(--primary-green);
            box-shadow: var(--shadow-xl);
        }

        .spec-header {
            display: flex;
            align-items: center;
            gap: var(--space-4);
            margin-bottom: var(--space-6);
        }

        .spec-icon {
            width: 64px;
            height: 64px;
            background: var(--primary-green);
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.75rem;
            color: var(--navy-dark);
            font-weight: 700;
            box-shadow: var(--shadow-md);
        }

        .spec-header h4 {
            font-family: var(--font-display);
            font-size: 1.5rem;
            font-weight: 700;
            margin: 0;
            letter-spacing: -0.01em;
        }

        .spec-list {
            list-style: none;
            padding: 0;
        }

        .spec-list li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: var(--space-3) 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 1rem;
        }

        .spec-list li:last-child {
            border-bottom: none;
        }

        .spec-value {
            font-weight: 700;
            color: var(--primary-green);
            font-family: var(--font-display);
        }

        /* Applications Section - Modern Premium Industrial */
        .applications {
            background: var(--off-white);
            position: relative;
        }

        .applications::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 600px;
            height: 600px;
            background: var(--primary-green);
            opacity: 0.03;
            border-radius: 50%;
            filter: blur(120px);
        }

        .app-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: var(--space-8);
            margin-top: var(--space-16);
            position: relative;
            z-index: 2;
        }

        .app-item {
            background: var(--white);
            border-radius: var(--radius-lg);
            padding: var(--space-8);
            text-align: center;
            box-shadow: var(--shadow-md);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            border: 1px solid var(--light-gray);
        }

        .app-item::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--primary-green);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .app-item:hover::after {
            transform: scaleX(1);
        }

        .app-item:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-xl);
            border-color: var(--primary-green);
        }

        .app-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto var(--space-6);
            background: rgba(148, 200, 66, 0.1);
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            color: var(--primary-green);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .app-item:hover .app-icon {
            transform: scale(1.1) rotate(5deg);
            background: var(--primary-green);
            color: var(--white);
        }

        .app-item h3 {
            font-family: var(--font-display);
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--navy-dark);
            margin-bottom: var(--space-3);
            letter-spacing: -0.01em;
        }

        .app-item p {
            color: var(--text-secondary);
            line-height: 1.7;
            margin-bottom: var(--space-6);
        }

        .app-benefits {
            list-style: none;
            padding: 0;
            text-align: left;
        }

        .app-benefits li {
            display: flex;
            align-items: center;
            gap: var(--space-3);
            margin-bottom: var(--space-2);
            font-size: 0.95rem;
            color: var(--text-secondary);
        }

        .app-benefits li i {
            color: var(--primary-green);
            font-size: 0.75rem;
        }

        /* Projects Section - Modern Premium Industrial */
        .projects {
            background: var(--white);
            position: relative;
            overflow: hidden;
        }

        .projects::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 600px;
            height: 600px;
            background: var(--primary-green);
            opacity: 0.03;
            border-radius: 50%;
            filter: blur(120px);
        }

        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(380px, 1fr));
            gap: var(--space-8);
            margin-top: var(--space-16);
            position: relative;
            z-index: 2;
        }

        .project-card {
            background: var(--white);
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow-md);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid var(--light-gray);
            position: relative;
        }

        .project-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-xl);
            border-color: var(--primary-green);
        }

        .project-image {
            height: 220px;
            background: linear-gradient(135deg, var(--navy-dark) 0%, var(--navy) 100%);
            position: relative;
            overflow: hidden;
        }

        .project-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image:
                linear-gradient(rgba(148, 200, 66, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(148, 200, 66, 0.03) 1px, transparent 1px);
            background-size: 30px 30px;
        }

        .project-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(10, 22, 40, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .project-card:hover .project-overlay {
            opacity: 1;
        }

        .project-stats {
            display: flex;
            gap: var(--space-8);
            color: var(--white);
        }

        .stat {
            text-align: center;
        }

        .stat-number {
            display: block;
            font-family: var(--font-display);
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--primary-green);
            letter-spacing: -0.02em;
        }

        .stat-label {
            font-size: 1rem;
            opacity: 0.9;
        }

        .project-content {
            padding: var(--space-8);
        }

        .project-category {
            display: inline-block;
            background: var(--primary-green);
            color: var(--white);
            padding: var(--space-2) var(--space-4);
            border-radius: var(--radius-md);
            font-size: 0.75rem;
            font-weight: 600;
            margin-bottom: var(--space-4);
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .project-content h3 {
            font-family: var(--font-display);
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--navy-dark);
            margin-bottom: var(--space-3);
            line-height: 1.3;
            letter-spacing: -0.01em;
        }

        .project-content p {
            color: var(--text-secondary);
            line-height: 1.7;
            margin-bottom: var(--space-6);
            font-size: 1rem;
        }

        .project-features {
            display: flex;
            flex-wrap: wrap;
            gap: var(--space-2);
            margin-bottom: var(--space-6);
        }

        .feature-tag {
            background: rgba(148, 200, 66, 0.1);
            color: var(--primary-green);
            padding: var(--space-2) var(--space-3);
            border-radius: var(--radius-md);
            font-size: 0.75rem;
            font-weight: 600;
            border: 1px solid rgba(148, 200, 66, 0.2);
        }

        .project-details {
            display: flex;
            gap: var(--space-6);
            flex-wrap: wrap;
            padding-top: var(--space-4);
            border-top: 1px solid var(--light-gray);
        }

        .detail-item {
            display: flex;
            align-items: center;
            gap: var(--space-2);
            color: var(--text-muted);
            font-size: 0.875rem;
            font-weight: 500;
        }

        .detail-item i {
            color: var(--primary-green);
            font-size: 1rem;
        }

        .projects-cta {
            background: linear-gradient(135deg, var(--navy-dark) 0%, var(--navy) 100%);
            color: var(--white);
            border-radius: var(--radius-xl);
            padding: var(--space-16) var(--space-12);
            text-align: center;
            margin-top: var(--space-16);
            position: relative;
            overflow: hidden;
        }

        .projects-cta::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image:
                linear-gradient(rgba(148, 200, 66, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(148, 200, 66, 0.03) 1px, transparent 1px);
            background-size: 40px 40px;
        }

        .projects-cta h3 {
            font-family: var(--font-display);
            font-size: clamp(1.75rem, 3vw, 2.5rem);
            font-weight: 800;
            margin-bottom: var(--space-4);
            position: relative;
            z-index: 2;
            letter-spacing: -0.02em;
        }

        .projects-cta p {
            font-size: 1.125rem;
            opacity: 0.9;
            margin-bottom: var(--space-8);
            position: relative;
            z-index: 2;
            line-height: 1.7;
        }

        .projects-cta .btn {
            position: relative;
            z-index: 2;
        }

        /* Contact Section - Modern Premium Industrial */
        .contact {
            background: linear-gradient(135deg, var(--navy-dark) 0%, var(--navy) 100%);
            color: var(--white);
            position: relative;
            overflow: hidden;
        }

        .contact::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image:
                linear-gradient(rgba(148, 200, 66, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(148, 200, 66, 0.03) 1px, transparent 1px);
            background-size: 50px 50px;
        }

        .contact-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-16);
            align-items: start;
            position: relative;
            z-index: 2;
        }

        .contact-info h2 {
            font-family: var(--font-display);
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 800;
            margin-bottom: var(--space-8);
            line-height: 1.2;
            letter-spacing: -0.02em;
        }

        .contact-description {
            font-size: 1.125rem;
            margin-bottom: var(--space-8);
            opacity: 0.9;
            line-height: 1.7;
        }

        .contact-details {
            space-y: var(--space-6);
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: var(--space-4);
            margin-bottom: var(--space-6);
            padding: var(--space-6);
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: var(--transition);
        }

        .contact-item:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateX(4px);
            border-color: var(--primary-green);
        }

        .contact-item i {
            font-size: 1.75rem;
            color: var(--primary-green);
            min-width: 48px;
            width: 56px;
            height: 56px;
            background: rgba(148, 200, 66, 0.1);
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .contact-item div h5 {
            font-family: var(--font-display);
            font-size: 1.125rem;
            font-weight: 700;
            margin-bottom: var(--space-2);
        }

        .contact-item div p {
            opacity: 0.9;
            margin: 0;
            font-size: 1rem;
            line-height: 1.5;
        }

        .contact-form {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border-radius: var(--radius-lg);
            padding: var(--space-12);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: var(--shadow-xl);
        }

        .contact-form h3 {
            font-family: var(--font-display);
            font-size: clamp(1.5rem, 3vw, 2rem);
            font-weight: 800;
            margin-bottom: var(--space-8);
            text-align: center;
            letter-spacing: -0.02em;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-6);
            margin-bottom: var(--space-6);
        }

        .form-group {
            margin-bottom: var(--space-6);
        }

        .form-group label {
            display: block;
            margin-bottom: var(--space-3);
            font-weight: 600;
            font-size: 1rem;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: var(--space-4);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: var(--radius-md);
            background: rgba(255, 255, 255, 0.05);
            color: var(--white);
            font-size: 1rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .form-group input::placeholder,
        .form-group textarea::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: var(--primary-green);
            background: rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 0 3px rgba(148, 200, 66, 0.1);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 140px;
        }

        .form-submit {
            text-align: center;
            margin-top: var(--space-8);
        }

        .btn-submit {
            background: var(--primary-green);
            color: var(--white);
            padding: var(--space-4) var(--space-8);
            border: none;
            border-radius: var(--radius-md);
            font-size: 1.125rem;
            font-weight: 700;
            font-family: var(--font-display);
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: var(--shadow-md);
            display: inline-flex;
            align-items: center;
            gap: var(--space-3);
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
            background: var(--primary-green-dark);
        }

        /* Footer - Modern Premium Industrial */
        footer {
            background: var(--navy-dark);
            color: var(--white);
            padding: var(--space-24) 0 var(--space-8) 0;
            position: relative;
            width: 100%;
            max-width: 100vw;
            overflow-x: hidden;
        }

        .footer-content {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: var(--space-16);
            margin-bottom: var(--space-12);
        }

        .footer-brand h3 {
            font-family: var(--font-display);
            font-size: 2rem;
            font-weight: 800;
            color: var(--primary-green);
            margin-bottom: var(--space-4);
            display: flex;
            align-items: center;
            gap: var(--space-2);
            letter-spacing: -0.02em;
        }

        .footer-brand p {
            opacity: 0.8;
            line-height: 1.7;
            margin-bottom: var(--space-8);
        }

        .footer-social {
            display: flex;
            gap: var(--space-3);
        }

        .social-link {
            width: 48px;
            height: 48px;
            background: rgba(148, 200, 66, 0.1);
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-green);
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid rgba(148, 200, 66, 0.2);
        }

        .social-link:hover {
            background: var(--primary-green);
            color: var(--white);
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .footer-section h4 {
            font-family: var(--font-display);
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: var(--space-6);
            color: var(--primary-green);
            letter-spacing: -0.01em;
        }

        .footer-links {
            list-style: none;
            padding: 0;
        }

        .footer-links li {
            margin-bottom: var(--space-3);
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: inline-block;
        }

        .footer-links a:hover {
            color: var(--primary-green);
            padding-left: var(--space-2);
            padding-left: 5px;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 2rem;
            text-align: center;
        }

        .footer-bottom p {
            opacity: 0.7;
            font-size: 0.95rem;
        }

        /* Floating Action Buttons */
        .fab-container {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            display: flex;
            flex-direction: column;
            gap: 1rem;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: var(--transition);
        }

        .fab {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: var(--white);
            border: none;
            border-radius: 50%;
            font-size: 1.5rem;
            cursor: pointer;
            box-shadow: var(--shadow);
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
        }

        .fab:hover {
            background: linear-gradient(135deg, var(--accent-color), var(--accent-light));
            transform: translateY(-5px) scale(1.1);
            box-shadow: var(--shadow-hover);
        }

        .fab.phone {
            background: linear-gradient(135deg, #94C842, #78A82E);
        }

        .fab.zalo {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
        }

        /* Product Cards */
        .product-card {
            transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1),
                        box-shadow 0.5s cubic-bezier(0.4, 0, 0.2, 1) !important;
            will-change: transform;
            backface-visibility: hidden;
        }

        .product-card:hover {
            transform: translateY(-15px) scale(1.02);
            box-shadow: 0 35px 70px rgba(148, 200, 66, 0.25) !important;
        }

        .product-icon {
            transition: transform 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        .product-card:hover .product-icon {
            transform: scale(1.1) rotate(10deg);
        }

        .product-badge {
            animation: pulse-badge 2s ease-in-out infinite;
        }

        @keyframes pulse-badge {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .product-btn {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
        }

        .product-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(148, 200, 66, 0.4) !important;
        }

        /* Calculator Tools Animations */
        .calc-tool {
            transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1),
                        border-color 0.5s cubic-bezier(0.4, 0, 0.2, 1),
                        box-shadow 0.5s cubic-bezier(0.4, 0, 0.2, 1) !important;
            will-change: transform;
            backface-visibility: hidden;
        }

        .calc-tool:hover {
            transform: translateY(-12px) scale(1.02);
            border-color: rgba(148, 200, 66, 0.5) !important;
            box-shadow: 0 25px 50px rgba(148, 200, 66, 0.25) !important;
        }

        .calc-tool:hover > div:first-of-type {
            transform: scale(1.15) rotate(5deg);
        }

        .calc-tool button:hover {
            transform: translateY(-2px) scale(1.05);
            box-shadow: 0 15px 40px rgba(148, 200, 66, 0.5) !important;
        }

        @keyframes float-slow {
            0%, 100% {
                transform: translate(0, 0) scale(1);
            }
            33% {
                transform: translate(30px, -30px) scale(1.1);
            }
            66% {
                transform: translate(-20px, 20px) scale(0.9);
            }
        }

        /* Animation Classes - Optimized for Performance */
        .animate-on-scroll {
            opacity: 0;
            transform: translateY(60px);
            transition: opacity 1s cubic-bezier(0.25, 0.46, 0.45, 0.94),
                        transform 1s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            will-change: opacity, transform;
            backface-visibility: hidden;
        }

        .animate-on-scroll.animated {
            opacity: 1;
            transform: translateY(0);
            will-change: auto;
        }

        .slide-in-left {
            opacity: 0;
            transform: translateX(-60px);
            transition: opacity 1s cubic-bezier(0.25, 0.46, 0.45, 0.94),
                        transform 1s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            will-change: opacity, transform;
            backface-visibility: hidden;
        }

        .slide-in-left.animated {
            opacity: 1;
            transform: translateX(0);
            will-change: auto;
        }

        .slide-in-right {
            opacity: 0;
            transform: translateX(60px);
            transition: opacity 1s cubic-bezier(0.25, 0.46, 0.45, 0.94),
                        transform 1s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            will-change: opacity, transform;
            backface-visibility: hidden;
        }

        .slide-in-right.animated {
            opacity: 1;
            transform: translateX(0);
            will-change: auto;
        }

        /* Mobile Optimization */
        @media (max-width: 768px) {
            html, body {
                overflow-x: hidden !important;
                max-width: 100vw !important;
            }

            * {
                max-width: 100%;
            }

            .section, .hero, footer {
                overflow-x: hidden !important;
                max-width: 100vw !important;
            }

            .nav-menu {
                position: fixed;
                top: 80px;
                left: -100%;
                width: 100%;
                max-width: 100vw;
                height: calc(100vh - 80px);
                background: rgba(255, 255, 255, 0.98);
                backdrop-filter: blur(30px);
                flex-direction: column;
                justify-content: flex-start;
                align-items: center;
                padding-top: 2rem;
                padding-bottom: 2rem;
                transition: left 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
                box-shadow: var(--shadow-lg);
                gap: 1.5rem;
                overflow-y: auto;
                overflow-x: hidden;
                -webkit-overflow-scrolling: touch;
            }

            .nav-menu.active {
                left: 0;
            }

            .nav-menu a {
                font-size: 1.1rem;
                padding: 0.875rem 1rem;
                width: 90%;
                max-width: 100%;
                text-align: center;
            }

            .nav-menu li {
                width: 100%;
                display: flex;
                justify-content: center;
            }

            .nav-cta {
                display: none;
            }

            .mobile-menu {
                display: block;
            }

            nav {
                padding: 0 var(--space-4);
            }

            .logo-text {
                font-size: 1.6rem;
            }

            .logo-img {
                width: 40px;
                height: 40px;
            }

            .hero-content {
                grid-template-columns: 1fr;
                gap: 3rem;
                text-align: center;
            }

            .hero-text h1 {
                font-size: 2.5rem;
                line-height: 1.2;
            }

            .hero-text .subtitle {
                font-size: 1.1rem;
            }

            .hero-features {
                grid-template-columns: repeat(2, 1fr);
                gap: 1rem;
                justify-items: center;
            }

            .hero-feature {
                flex-direction: column;
                text-align: center;
                gap: 0.5rem;
                padding: 1rem;
                background: rgba(255, 255, 255, 0.1);
                border-radius: 10px;
                backdrop-filter: blur(10px);
            }

            .hero-buttons {
                flex-direction: column;
                align-items: center;
                width: 100%;
            }

            .btn {
                width: 100%;
                max-width: 280px;
                justify-content: center;
                padding: 1rem 2rem;
                font-size: 1rem;
            }

            .section-title {
                font-size: 2rem;
                line-height: 1.3;
            }

            .section-subtitle {
                font-size: 1.1rem;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 2rem;
            }

            .about-content {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .about-text, .about-visual {
                width: 100%;
                max-width: 100%;
            }

            .about-highlights {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .highlight-item {
                padding: var(--space-4);
                width: 100%;
                max-width: 100%;
            }

            .highlight-item h5 {
                font-size: 0.95rem;
            }

            .highlight-item p {
                font-size: 0.85rem;
            }

            .company-stats {
                grid-template-columns: 1fr;
                gap: 1.5rem;
                padding: 0 1rem;
            }

            .stat-card {
                width: 100%;
                max-width: 100%;
                padding: 1.5rem 1rem;
            }

            .stat-card .number {
                font-size: 2rem;
                word-break: keep-all;
                white-space: nowrap;
            }

            .stat-card .label {
                font-size: 0.9rem;
            }

            .company-card {
                padding: var(--space-6);
                width: 100%;
                max-width: 100%;
                overflow: hidden;
            }

            .company-info {
                width: 100%;
                overflow-wrap: break-word;
                word-wrap: break-word;
            }

            .company-info p {
                font-size: 0.95rem;
                line-height: 1.6;
            }

            .projects-grid,
            .specs-grid,
            .calc-tools-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .factors-grid,
            .benefits-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .calc-intro,
            .calc-benefits,
            .calc-cta {
                padding: 2rem;
            }

            .calc-cta h3 {
                font-size: 1.8rem;
            }

            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }

            .cta-buttons .btn {
                width: 100%;
                max-width: 280px;
            }

            .project-card {
                margin-bottom: 2rem;
            }

            .project-stats {
                flex-direction: column;
                gap: 1rem;
            }

            .project-details {
                flex-direction: column;
                gap: 1rem;
            }

            .projects-cta {
                padding: 3rem 2rem;
            }

            .projects-cta h3 {
                font-size: 1.8rem;
            }

            .feature-card,
            .app-item,
            .spec-card {
                padding: 2rem;
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .contact-form {
                padding: 2rem;
            }

            .footer-content {
                grid-template-columns: 1fr;
                text-align: center;
                gap: 2rem;
            }

            .fab-container {
                bottom: 1rem;
                right: 1rem;
            }

            .fab {
                width: 50px;
                height: 50px;
                font-size: 1.3rem;
            }

            .floating-cards {
                height: auto;
                display: flex;
                flex-direction: column;
                gap: 1rem;
            }

            .floating-card {
                position: relative !important;
                width: 100% !important;
                top: auto !important;
                left: auto !important;
                right: auto !important;
                bottom: auto !important;
                transform: none !important;
                margin-bottom: 1rem;
            }

            .about-content,
            .contact-content {
                grid-template-columns: 1fr;
                gap: 3rem;
            }

            .about-highlights {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .company-stats {
                grid-template-columns: repeat(3, 1fr);
                gap: 1rem;
            }

            .stat-card {
                padding: 1rem;
            }

            .stat-card .number {
                font-size: 1.5rem;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 0 1rem;
            }

            .hero {
                padding-top: 100px;
                height: auto;
                min-height: 100vh;
            }

            .hero-text h1 {
                font-size: 2rem;
            }

            .hero-features {
                grid-template-columns: 1fr;
            }

            .section-title {
                font-size: 1.8rem;
            }

            .stats-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .stat-card {
                padding: 1.5rem;
            }

            .feature-card,
            .app-item,
            .spec-card {
                padding: 1.5rem;
            }

            .contact-form {
                padding: 1.5rem;
            }

            .contact-form h3 {
                font-size: 1.5rem;
            }

            .fab {
                width: 45px;
                height: 45px;
                font-size: 1.2rem;
            }

            .logo-text {
                font-size: 1.4rem;
            }

            .logo-img {
                width: 35px;
                height: 35px;
            }
        }

        /* Tablet Optimization */
        @media (max-width: 1024px) and (min-width: 769px) {
            .hero-content,
            .about-content,
            .contact-content {
                grid-template-columns: 1fr;
                gap: 4rem;
                text-align: center;
            }

            .footer-content {
                grid-template-columns: repeat(2, 1fr);
                gap: 3rem;
            }

            .section-title {
                font-size: 2.5rem;
            }

            .hero-text h1 {
                font-size: 3rem;
            }

            .features-grid,
            .app-grid,
            .projects-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 2.5rem;
            }

            .specs-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 2.5rem;
            }
        }

        /* Touch Device Optimizations */
        @media (hover: none) and (pointer: coarse) {
            .feature-card,
            .app-item,
            .spec-card {
                transform: none !important;
            }

            .feature-card:active,
            .app-item:active,
            .spec-card:active {
                transform: scale(0.98);
                transition: transform 0.1s ease;
            }

            .btn:hover {
                transform: none;
            }

            .btn:active {
                transform: scale(0.95);
            }

            .fab:hover {
                transform: none;
            }

            .fab:active {
                transform: scale(0.9);
            }
        }

        /* High DPI Display Support */
        @media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
            .logo-img {
                image-rendering: -webkit-optimize-contrast;
                image-rendering: crisp-edges;
            }
        }

        /* Landscape Mobile Optimization */
        @media (max-width: 768px) and (orientation: landscape) {
            .hero {
                height: auto;
                min-height: 100vh;
                padding: 6rem 0 4rem 0;
            }

            .hero-text h1 {
                font-size: 2.2rem;
            }

            .stats-grid {
                grid-template-columns: repeat(4, 1fr);
                gap: 1rem;
            }

            .fab-container {
                bottom: 0.5rem;
                right: 0.5rem;
            }
        }

        /* Accessibility Improvements */
        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }

            .floating-card {
                animation: none !important;
            }

            .animate-on-scroll {
                opacity: 1;
                transform: none;
            }
        }

        /* Focus Indicators for Keyboard Navigation */
        .nav-menu a:focus,
        .btn:focus,
        .fab:focus,
        input:focus,
        textarea:focus,
        select:focus {
            outline: 2px solid var(--accent-color) !important;
            outline-offset: 2px !important;
        }

        /* Dark Mode Support - Premium Industrial Dark Theme */
        @media (prefers-color-scheme: dark) {
            :root {
                /* Dark Mode Color Adjustments */
                --navy-dark: #0A0E14;               /* Darker Navy for BG */
                --navy: #121820;                    /* Dark Background */
                --navy-light: #1A2332;              /* Lighter Navy for cards */

                --white: #0A0E14;                   /* BG becomes dark */
                --off-white: #121820;               /* Off-white becomes dark */
                --light-gray: #1A2332;              /* Light gray becomes navy */

                --text-primary: #F8F9FA;            /* Light text for readability */
                --text-secondary: #CBD5E0;          /* Secondary text lighter */
                --text-muted: #A0AEC0;              /* Muted text lighter */

                /* Green stays vibrant */
                --primary-green: #A8D657;           /* Lighter green for dark mode */
                --primary-green-dark: #94C842;      /* Original green as dark variant */
                --primary-green-light: #B8E068;     /* Even lighter green */

                /* Accent colors stay vibrant */
                --accent-gold: #FFE55C;             /* Lighter gold for visibility */
                --accent-orange: #FF8A5B;           /* Lighter orange */

                /* Adjusted shadows for dark mode */
                --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.3);
                --shadow-md: 0 4px 16px rgba(0, 0, 0, 0.4);
                --shadow-lg: 0 8px 32px rgba(0, 0, 0, 0.5);
                --shadow-xl: 0 16px 48px rgba(0, 0, 0, 0.6);
                --shadow-2xl: 0 24px 64px rgba(0, 0, 0, 0.7);
            }

            /* Navigation adjustments */
            .nav-menu {
                background: rgba(26, 35, 50, 0.95);
                backdrop-filter: blur(20px);
            }

            header {
                background: rgba(18, 24, 32, 0.95);
            }

            /* Card and section adjustments */
            .feature-card,
            .app-item,
            .spec-card,
            .contact-card {
                background: linear-gradient(135deg, rgba(26, 35, 50, 0.8), rgba(18, 24, 32, 0.9));
                border: 1px solid rgba(168, 214, 87, 0.1);
            }

            /* Hero section gradient */
            .hero {
                background: linear-gradient(135deg, #0A0E14 0%, #1A2332 50%, #0A1628 100%);
            }

            /* Footer */
            footer {
                background: linear-gradient(135deg, #0A0E14, #121820);
            }

            /* Ensure good contrast for buttons */
            .btn-primary,
            .fab {
                box-shadow: 0 8px 24px rgba(168, 214, 87, 0.3);
            }

            .btn-primary:hover,
            .fab:hover {
                box-shadow: 0 12px 32px rgba(168, 214, 87, 0.4);
            }

            /* Input fields */
            input,
            textarea,
            select {
                background: rgba(26, 35, 50, 0.5);
                border-color: rgba(168, 214, 87, 0.2);
                color: var(--text-primary);
            }

            input::placeholder,
            textarea::placeholder {
                color: var(--text-muted);
            }

            /* Ensure images don't get too bright */
            img {
                opacity: 0.95;
            }
        }

        /* Print Styles */
        @media print {
            .loading,
            .scroll-progress,
            header,
            .fab-container,
            .hero-buttons,
            .contact-form,
            .mobile-menu {
                display: none !important;
            }

            body {
                font-size: 12pt;
                line-height: 1.4;
                color: #000;
            }

            .hero {
                height: auto;
                background: none;
                color: #000;
            }

            .section-title {
                font-size: 18pt;
                page-break-after: avoid;
                color: #000;
            }

            .feature-card,
            .app-item,
            .spec-card {
                break-inside: avoid;
                box-shadow: none;
                border: 1px solid #ccc;
            }
        }
        
        .logo-img {
    height: 40px;     /* chỉnh kích thước tùy ý */
    width: auto;
    object-fit: contain;
}

    </style>
</head>
<body>
    <!-- Loading Screen -->
    <div class="loading">
        <div class="loader"></div>
        <div class="loading-text">Đang tải 3igreen...</div>
    </div>

    <!-- Scroll Progress -->
    <div class="scroll-progress"></div>

    <!-- Header -->
    <header>
        <nav>
           <a href="#" class="logo">
    <img src="logo.png" alt="Logo" class="logo-img">
</a>

            <ul class="nav-menu">
                <li><a href="#home">Trang chủ</a></li>
                <li><a href="#about">Giới thiệu</a></li>
                <li><a href="#team">Lãnh đạo</a></li>
                <li><a href="#features">Tính năng</a></li>
                <li><a href="#products">Sản phẩm</a></li>
                <li><a href="#projects">Dự án</a></li>
                <li><a href="#news">Tin tức</a></li>
                <li><a href="#support">Công cụ hỗ trợ</a></li>
                <li><a href="#applications">Ứng dụng</a></li>
                <li><a href="#contact">Liên hệ</a></li>
            </ul>
            <a href="#contact" class="nav-cta">
                <i class="fas fa-phone"></i>
                Báo giá ngay
            </a>
            <div class="mobile-menu">
                <i class="fas fa-bars"></i>
            </div>
        </nav>
    </header>

    <main>
        <!-- Hero Section -->
        <section class="hero" id="home">
            <!-- Hero Background Slider -->
            <div class="hero-slider">
                <div class="hero-slide active" style="background-image: url('https://images.unsplash.com/photo-1581094271901-8022df4466f9?auto=format&fit=crop&w=1920&q=80');"></div>
                <div class="hero-slide" style="background-image: url('https://images.unsplash.com/photo-1504917595217-d4dc5ebe6122?auto=format&fit=crop&w=1920&q=80');"></div>
                <div class="hero-slide" style="background-image: url('https://images.unsplash.com/photo-1513467535987-fd81bc7d62f8?auto=format&fit=crop&w=1920&q=80');"></div>
                <div class="hero-slide" style="background-image: url('https://images.unsplash.com/photo-1587293852726-70cdb56c2866?auto=format&fit=crop&w=1920&q=80');"></div>
            </div>

            <!-- Hero Overlay for Better Text Readability -->
            <div class="hero-overlay"></div>

            <div class="hero-content">
                <div class="hero-text">
                    <h1>Gói Đỡ <span class="highlight">PU Foam</span> Cách Nhiệt Chuyên Nghiệp</h1>
                    <p class="subtitle">Giải pháp tối ưu cho hệ thống lạnh, chiller và điều hòa không khí với công nghệ tiên tiến nhất, đảm bảo hiệu suất vượt trội và tiết kiệm năng lượng tối đa. <strong>Tiết kiệm 70% thời gian thi công</strong> như công nghệ KingsPipe.</p>
                    
                    <div class="hero-features">
                        <div class="hero-feature">
                            <i class="fas fa-thermometer-half"></i>
                            <span>Cách nhiệt vượt trội</span>
                        </div>
                        <div class="hero-feature">
                            <i class="fas fa-shield-alt"></i>
                            <span>Chống thấm hoàn hảo</span>
                        </div>
                        <div class="hero-feature">
                            <i class="fas fa-dumbbell"></i>
                            <span>Chịu lực cao</span>
                        </div>
                        <div class="hero-feature">
                            <i class="fas fa-clock"></i>
                            <span>Tiết kiệm 70% thời gian</span>
                        </div>
                    </div>
                    
                    <div class="hero-buttons">
                        <a href="#contact" class="btn btn-primary">
                            <i class="fas fa-calculator"></i>
                            Nhận Báo Giá Miễn Phí
                        </a>
                        <a href="#features" class="btn btn-outline">
                            <i class="fas fa-info-circle"></i>
                            Tìm Hiểu Chi Tiết
                        </a>
                    </div>
                </div>
                <div class="hero-visual">
                    <div class="floating-cards">
                        <div class="floating-card card-1">
                            <h4><i class="fas fa-award"></i> Chất Lượng Cao</h4>
                            <p>Sản phẩm đạt tiêu chuẩn quốc tế PU Foam, được kiểm định nghiêm ngặt</p>
                            <div class="stats">
                                <div class="stat-item">
                                    <div class="stat-number">99%</div>
                                    <div class="stat-label">Hài lòng</div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-number">5★</div>
                                    <div class="stat-label">Đánh giá</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="floating-card card-2">
                            <h4><i class="fas fa-tools"></i> Thi Công Nhanh</h4>
                            <p>Lắp đặt dễ dàng, tiết kiệm 70% thời gian và chi phí</p>
                        </div>
                        
                        <div class="floating-card card-3">
                            <h4><i class="fas fa-phone-alt"></i> Hỗ Trợ 24/7</h4>
                            <p>Tư vấn miễn phí mọi lúc</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Stats Section -->
        <div class="stats-section">
            <div class="container">
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="number">500+</div>
                        <div class="label">Dự án hoàn thành</div>
                    </div>
                    <div class="stat-card">
                        <div class="number">70%</div>
                        <div class="label">Tiết kiệm thời gian thi công</div>
                    </div>
                    <div class="stat-card">
                        <div class="number">10+</div>
                        <div class="label">Năm kinh nghiệm</div>
                    </div>
                    <div class="stat-card">
                        <div class="number">99%</div>
                        <div class="label">Khách hàng hài lòng</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- About Section -->
        <section class="about" id="about">
            <div class="container">
                <div class="section-header animate-on-scroll">
                    <div class="section-badge">
                        <i class="fas fa-building"></i>
                        Về chúng tôi
                    </div>
                    <h2 class="section-title">Công Ty Hàng Đầu Về Vật Liệu Xanh</h2>
                    <p class="section-subtitle">3igreen cam kết mang đến những sản phẩm chất lượng cao nhất, áp dụng công nghệ PU Foam tiên tiến như KingsPipe, góp phần xây dựng một tương lai bền vững cho môi trường và xã hội.</p>
                </div>
                
                <div class="about-content">
                    <div class="about-text slide-in-left animate-on-scroll">
                        <h3>Tiên Phong Trong Công Nghệ Vật Liệu Xanh PU Foam</h3>
                        <p>Với hơn 10 năm kinh nghiệm trong lĩnh vực sản xuất và ứng dụng vật liệu xanh, <strong>CÔNG TY TNHH SẢN XUẤT VÀ ỨNG DỤNG VẬT LIỆU XANH 3I</strong> đã khẳng định được vị thế hàng đầu trong ngành.</p>
                        
                        <p>Chúng tôi chuyên sản xuất các sản phẩm gói đỡ PU Foam chất lượng cao, ứng dụng công nghệ PU (Polyisocyanurate) và PUR (Polyurethane) tiên tiến, được ứng dụng rộng rãi trong các hệ thống công nghiệp hiện đại. <strong>Tiết kiệm 70% thời gian thi công</strong> nhờ thiết kế sáng tạo và quy trình tối ưu.</p>

                        <div class="about-highlights">
                            <div class="highlight-item">
                                <i class="fas fa-industry"></i>
                                <div>
                                    <h5>Công nghệ PU Foam tiên tiến</h5>
                                    <p>Dây chuyền sản xuất hiện đại từ Châu Âu</p>
                                </div>
                            </div>
                            <div class="highlight-item">
                                <i class="fas fa-certificate"></i>
                                <div>
                                    <h5>Chứng nhận chất lượng</h5>
                                    <p>Đạt các tiêu chuẩn ISO quốc tế</p>
                                </div>
                            </div>
                            <div class="highlight-item">
                                <i class="fas fa-users"></i>
                                <div>
                                    <h5>Đội ngũ chuyên nghiệp</h5>
                                    <p>Kỹ sư giàu kinh nghiệm trong ngành</p>
                                </div>
                            </div>
                            <div class="highlight-item">
                                <i class="fas fa-handshake"></i>
                                <div>
                                    <h5>Cam kết chất lượng</h5>
                                    <p>Bảo hành dài hạn và hỗ trợ 24/7</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="about-visual slide-in-right animate-on-scroll">
                        <div class="company-card">
                            <div class="company-logo">
                                <img src="logo.png" alt="3iGreen Logo" style="width: 100%; height: 100%; object-fit: contain; border-radius: 20px;">
                            </div>
                            <div class="company-info">
                                <h4>3igreen - Vật Liệu Xanh</h4>
                                <p>Mã số thuế: <strong>0110886479</strong></p>
                                <p>Chúng tôi tự hào là đối tác tin cậy của hàng trăm doanh nghiệp lớn trong và ngoài nước, góp phần vào sự phát triển bền vững của ngành công nghiệp Việt Nam với công nghệ PU Foam tiên tiến.</p>
                            </div>
                            <div class="company-stats">
                                <div class="stat-card">
                                    <div class="number">500+</div>
                                    <div class="label">Dự án</div>
                                </div>
                                <div class="stat-card">
                                    <div class="number">10+</div>
                                    <div class="label">Năm KN</div>
                                </div>
                                <div class="stat-card">
                                    <div class="number">99%</div>
                                    <div class="label">Hài lòng</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Partners Section -->
        <section class="partners-section">
            <div class="container">
                <div class="section-header animate-on-scroll" style="text-align: center; margin-bottom: 3rem;">
                    <div class="section-badge">
                        <i class="fas fa-handshake"></i>
                        Đối tác chiến lược
                    </div>
                    <h2 class="section-title">Đối Tác Tin Cậy</h2>
                    <p class="section-subtitle">Được tin tưởng bởi các tập đoàn và doanh nghiệp hàng đầu</p>
                </div>
            </div>
            <div class="partners-slider">
                <!-- Duplicate logos for seamless loop -->
                <div class="partner-logo">
                    <img src="https://via.placeholder.com/180x80/f8f9fa/94C842?text=Partner+1" alt="Partner 1">
                </div>
                <div class="partner-logo">
                    <img src="https://via.placeholder.com/180x80/f8f9fa/94C842?text=Partner+2" alt="Partner 2">
                </div>
                <div class="partner-logo">
                    <img src="https://via.placeholder.com/180x80/f8f9fa/94C842?text=Partner+3" alt="Partner 3">
                </div>
                <div class="partner-logo">
                    <img src="https://via.placeholder.com/180x80/f8f9fa/94C842?text=Partner+4" alt="Partner 4">
                </div>
                <div class="partner-logo">
                    <img src="https://via.placeholder.com/180x80/f8f9fa/94C842?text=Partner+5" alt="Partner 5">
                </div>
                <div class="partner-logo">
                    <img src="https://via.placeholder.com/180x80/f8f9fa/94C842?text=Partner+6" alt="Partner 6">
                </div>
                <!-- Duplicate for seamless loop -->
                <div class="partner-logo">
                    <img src="https://via.placeholder.com/180x80/f8f9fa/94C842?text=Partner+1" alt="Partner 1">
                </div>
                <div class="partner-logo">
                    <img src="https://via.placeholder.com/180x80/f8f9fa/94C842?text=Partner+2" alt="Partner 2">
                </div>
                <div class="partner-logo">
                    <img src="https://via.placeholder.com/180x80/f8f9fa/94C842?text=Partner+3" alt="Partner 3">
                </div>
                <div class="partner-logo">
                    <img src="https://via.placeholder.com/180x80/f8f9fa/94C842?text=Partner+4" alt="Partner 4">
                </div>
                <div class="partner-logo">
                    <img src="https://via.placeholder.com/180x80/f8f9fa/94C842?text=Partner+5" alt="Partner 5">
                </div>
                <div class="partner-logo">
                    <img src="https://via.placeholder.com/180x80/f8f9fa/94C842?text=Partner+6" alt="Partner 6">
                </div>
            </div>
        </section>

        <!-- Leadership & Team Section -->
        <section class="team" id="team" style="padding: 6rem 0; background: var(--white); position: relative;">
            <div class="container">
                <div class="section-header animate-on-scroll">
                    <div class="section-badge">
                        <i class="fas fa-users"></i>
                        Đội ngũ lãnh đạo
                    </div>
                    <h2 class="section-title">Ban Lãnh Đạo 3iGreen</h2>
                    <p class="section-subtitle">Đội ngũ lãnh đạo giàu kinh nghiệm, tâm huyết với sứ mệnh phát triển vật liệu xanh bền vững</p>
                </div>

                <div class="team-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; margin-top: 4rem;">
                    <!-- CEO -->
                    <div class="team-member animate-on-scroll" style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 8px 32px rgba(10, 22, 40, 0.12); transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); border: 1px solid #E9ECEF;">
                        <div class="member-photo" style="width: 100%; height: 300px; position: relative; overflow: hidden; background: linear-gradient(135deg, #0A1628 0%, #1A2332 100%);">
                            <img src="ceo.jpg" alt="CEO" style="width: 100%; height: 100%; object-fit: cover;">
                            <div style="position: absolute; top: 16px; right: 16px; background: rgba(148, 200, 66, 0.95); padding: 0.5rem 1rem; border-radius: 8px; font-size: 0.8rem; font-weight: 700; color: white;">
                                <i class="fas fa-crown"></i> CEO
                            </div>
                        </div>
                        <div style="padding: 2rem;">
                            <h3 style="font-size: 1.5rem; font-weight: 800; color: #0A1628; margin-bottom: 0.5rem; font-family: 'Poppins', sans-serif; letter-spacing: -0.01em;">Nguyễn Văn A</h3>
                            <p style="color: #94C842; font-weight: 700; margin-bottom: 1rem; font-size: 1rem;">Giám Đốc Điều Hành</p>
                            <p style="color: #2D3748; line-height: 1.7; margin-bottom: 1.5rem;">Hơn 15 năm kinh nghiệm trong lĩnh vực vật liệu xanh và công nghệ cách nhiệt tiên tiến.</p>
                            <div class="social-links" style="display: flex; gap: 0.75rem;">
                                <a href="#" style="width: 40px; height: 40px; background: rgba(148, 200, 66, 0.1); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #94C842; text-decoration: none; transition: all 0.3s; border: 1px solid rgba(148, 200, 66, 0.2);">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="#" style="width: 40px; height: 40px; background: rgba(148, 200, 66, 0.1); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #94C842; text-decoration: none; transition: all 0.3s; border: 1px solid rgba(148, 200, 66, 0.2);">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- CTO -->
                    <div class="team-member animate-on-scroll" style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 8px 32px rgba(10, 22, 40, 0.12); transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); border: 1px solid #E9ECEF;">
                        <div class="member-photo" style="width: 100%; height: 300px; position: relative; overflow: hidden; background: linear-gradient(135deg, #1A2332 0%, #2C3E50 100%);">
                            <img src="ceo.jpg" alt="CTO" style="width: 100%; height: 100%; object-fit: cover;">
                            <div style="position: absolute; top: 16px; right: 16px; background: rgba(148, 200, 66, 0.95); padding: 0.5rem 1rem; border-radius: 8px; font-size: 0.8rem; font-weight: 700; color: white;">
                                <i class="fas fa-cog"></i> CTO
                            </div>
                        </div>
                        <div style="padding: 2rem;">
                            <h3 style="font-size: 1.5rem; font-weight: 800; color: #0A1628; margin-bottom: 0.5rem; font-family: 'Poppins', sans-serif; letter-spacing: -0.01em;">Trần Thị B</h3>
                            <p style="color: #94C842; font-weight: 700; margin-bottom: 1rem; font-size: 1rem;">Giám Đốc Công Nghệ</p>
                            <p style="color: #2D3748; line-height: 1.7; margin-bottom: 1.5rem;">Chuyên gia công nghệ PU Foam với 12 năm kinh nghiệm nghiên cứu và phát triển sản phẩm.</p>
                            <div class="social-links" style="display: flex; gap: 0.75rem;">
                                <a href="#" style="width: 40px; height: 40px; background: rgba(148, 200, 66, 0.1); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #94C842; text-decoration: none; transition: all 0.3s; border: 1px solid rgba(148, 200, 66, 0.2);">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="#" style="width: 40px; height: 40px; background: rgba(148, 200, 66, 0.1); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #94C842; text-decoration: none; transition: all 0.3s; border: 1px solid rgba(148, 200, 66, 0.2);">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Sales Director -->
                    <div class="team-member animate-on-scroll" style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 8px 32px rgba(10, 22, 40, 0.12); transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); border: 1px solid #E9ECEF;">
                        <div class="member-photo" style="width: 100%; height: 300px; position: relative; overflow: hidden; background: linear-gradient(135deg, #0A1628 0%, #1A2332 100%);">
                            <img src="ceo.jpg" alt="Sales Director" style="width: 100%; height: 100%; object-fit: cover;">
                            <div style="position: absolute; top: 16px; right: 16px; background: rgba(148, 200, 66, 0.95); padding: 0.5rem 1rem; border-radius: 8px; font-size: 0.8rem; font-weight: 700; color: white;">
                                <i class="fas fa-chart-line"></i> Director
                            </div>
                        </div>
                        <div style="padding: 2rem;">
                            <h3 style="font-size: 1.5rem; font-weight: 800; color: #0A1628; margin-bottom: 0.5rem; font-family: 'Poppins', sans-serif; letter-spacing: -0.01em;">Lê Văn C</h3>
                            <p style="color: #94C842; font-weight: 700; margin-bottom: 1rem; font-size: 1rem;">Giám Đốc Kinh Doanh</p>
                            <p style="color: #2D3748; line-height: 1.7; margin-bottom: 1.5rem;">10 năm kinh nghiệm phát triển thị trường và xây dựng mối quan hệ đối tác chiến lược.</p>
                            <div class="social-links" style="display: flex; gap: 0.75rem;">
                                <a href="#" style="width: 40px; height: 40px; background: rgba(148, 200, 66, 0.1); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #94C842; text-decoration: none; transition: all 0.3s; border: 1px solid rgba(148, 200, 66, 0.2);">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="#" style="width: 40px; height: 40px; background: rgba(148, 200, 66, 0.1); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #94C842; text-decoration: none; transition: all 0.3s; border: 1px solid rgba(148, 200, 66, 0.2);">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Production Manager -->
                    <div class="team-member animate-on-scroll" style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 8px 32px rgba(10, 22, 40, 0.12); transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); border: 1px solid #E9ECEF;">
                        <div class="member-photo" style="width: 100%; height: 300px; position: relative; overflow: hidden; background: linear-gradient(135deg, #1A2332 0%, #2C3E50 100%);">
                            <img src="ceo.jpg" alt="Production Manager" style="width: 100%; height: 100%; object-fit: cover;">
                            <div style="position: absolute; top: 16px; right: 16px; background: rgba(148, 200, 66, 0.95); padding: 0.5rem 1rem; border-radius: 8px; font-size: 0.8rem; font-weight: 700; color: white;">
                                <i class="fas fa-industry"></i> Manager
                            </div>
                        </div>
                        <div style="padding: 2rem;">
                            <h3 style="font-size: 1.5rem; font-weight: 800; color: #0A1628; margin-bottom: 0.5rem; font-family: 'Poppins', sans-serif; letter-spacing: -0.01em;">Phạm Thị D</h3>
                            <p style="color: #94C842; font-weight: 700; margin-bottom: 1rem; font-size: 1rem;">Quản Lý Sản Xuất</p>
                            <p style="color: #2D3748; line-height: 1.7; margin-bottom: 1.5rem;">Chuyên gia sản xuất với 14 năm kinh nghiệm đảm bảo chất lượng và tối ưu quy trình.</p>
                            <div class="social-links" style="display: flex; gap: 0.75rem;">
                                <a href="#" style="width: 40px; height: 40px; background: rgba(148, 200, 66, 0.1); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #94C842; text-decoration: none; transition: all 0.3s; border: 1px solid rgba(148, 200, 66, 0.2);">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="#" style="width: 40px; height: 40px; background: rgba(148, 200, 66, 0.1); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #94C842; text-decoration: none; transition: all 0.3s; border: 1px solid rgba(148, 200, 66, 0.2);">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Team Stats -->
                <div style="margin-top: 4rem; display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 2rem;">
                    <div style="text-align: center; padding: 2rem; background: white; border-radius: 20px; box-shadow: 0 10px 30px rgba(148, 200, 66, 0.1);">
                        <div style="font-size: 3rem; font-weight: 800; color: #94C842; margin-bottom: 0.5rem;">50+</div>
                        <div style="color: #374151; font-weight: 600;">Nhân viên chuyên nghiệp</div>
                    </div>
                    <div style="text-align: center; padding: 2rem; background: white; border-radius: 20px; box-shadow: 0 10px 30px rgba(148, 200, 66, 0.1);">
                        <div style="font-size: 3rem; font-weight: 800; color: #FFD93D; margin-bottom: 0.5rem;">15+</div>
                        <div style="color: #374151; font-weight: 600;">Năm kinh nghiệm</div>
                    </div>
                    <div style="text-align: center; padding: 2rem; background: white; border-radius: 20px; box-shadow: 0 10px 30px rgba(148, 200, 66, 0.1);">
                        <div style="font-size: 3rem; font-weight: 800; color: #FF6B35; margin-bottom: 0.5rem;">100%</div>
                        <div style="color: #374151; font-weight: 600;">Tâm huyết & chuyên nghiệp</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="features" id="features">
            <div class="container">
                <div class="section-header animate-on-scroll">
                    <div class="section-badge">
                        <i class="fas fa-star"></i>
                        Tính năng vượt trội
                    </div>
                    <h2 class="section-title">Đặc Tính Nổi Bật Của Gói Đỡ PU Foam PU Foam</h2>
                    <p class="section-subtitle">Sản phẩm gói đỡ PU Foam 3igreen được thiết kế và sản xuất với những tính năng vượt trội, áp dụng công nghệ PU Foam hiện đại nhất, đáp ứng mọi yêu cầu khắt khe của các hệ thống công nghiệp hiện đại.</p>
                </div>
                
                <div class="features-grid">
                    <div class="feature-card animate-on-scroll">
                        <div class="feature-icon">
                            <i class="fas fa-thermometer-half"></i>
                        </div>
                        <h3>Cách Nhiệt Siêu Việt PU</h3>
                        <p>Với hệ số dẫn nhiệt cực thấp λ ≤ 0.022 W/m.K của công nghệ PU (Polyisocyanurate), gói đỡ PU Foam ngăn chặn hiệu quả sự trao đổi nhiệt, giúp duy trì nhiệt độ ổn định cho hệ thống.</p>
                        <ul class="feature-benefits">
                            <li><i class="fas fa-check-circle"></i> Giảm thất thoát nhiệt lên đến 95%</li>
                            <li><i class="fas fa-check-circle"></i> Chống đọng sương hoàn toàn</li>
                            <li><i class="fas fa-check-circle"></i> Tiết kiệm điện năng đáng kể</li>
                            <li><i class="fas fa-check-circle"></i> Duy trì hiệu suất dài lâu</li>
                        </ul>
                    </div>
                    
                    <div class="feature-card animate-on-scroll">
                        <div class="feature-icon">
                            <i class="fas fa-dumbbell"></i>
                        </div>
                        <h3>Sức Chịu Tải Vượt Trội</h3>
                        <p>Khả năng chịu nén lên đến 300 kPa với công nghệ PU Foam, đảm bảo chịu được tải trọng lớn của đường ống và áp lực vận hành mà không bị biến dạng.</p>
                        <ul class="feature-benefits">
                            <li><i class="fas fa-check-circle"></i> Chịu tải trọng lên đến 5 tấn/m²</li>
                            <li><i class="fas fa-check-circle"></i> Không bị lún, biến dạng theo thời gian</li>
                            <li><i class="fas fa-check-circle"></i> Phù hợp với mọi loại đường ống</li>
                            <li><i class="fas fa-check-circle"></i> Tuổi thọ sử dụng trên 25 năm</li>
                        </ul>
                    </div>
                    
                    <div class="feature-card animate-on-scroll">
                        <div class="feature-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3>Chống Thấm Tuyệt Đối</h3>
                        <p>Cấu trúc ô kín hoàn toàn với độ hút nước < 1% theo thể tích của PU, ngăn nước và hơi ẩm xâm nhập, bảo vệ đường ống khỏi ăn mòn.</p>
                        <ul class="feature-benefits">
                            <li><i class="fas fa-check-circle"></i> Độ hút nước cực thấp < 1%</li>
                            <li><i class="fas fa-check-circle"></i> Chống ăn mòn hiệu quả</li>
                            <li><i class="fas fa-check-circle"></i> Kháng hóa chất công nghiệp</li>
                            <li><i class="fas fa-check-circle"></i> Không bị phân hủy trong môi trường ẩm</li>
                        </ul>
                    </div>
                    
                    <div class="feature-card animate-on-scroll">
                        <div class="feature-icon">
                            <i class="fas fa-feather-alt"></i>
                        </div>
                        <h3>Nhẹ & Dễ Lắp Đặt</h3>
                        <p>Trọng lượng nhẹ chỉ 30-50 kg/m³, dễ dàng vận chuyển và lắp đặt, <strong>tiết kiệm 70% thời gian thi công</strong> như công nghệ KingsPipe.</p>
                        <ul class="feature-benefits">
                            <li><i class="fas fa-check-circle"></i> Trọng lượng siêu nhẹ</li>
                            <li><i class="fas fa-check-circle"></i> Cắt và tạo hình dễ dàng</li>
                            <li><i class="fas fa-check-circle"></i> Lắp đặt nhanh chóng</li>
                            <li><i class="fas fa-check-circle"></i> Tiết kiệm 70% thời gian thi công</li>
                        </ul>
                    </div>
                    
                    <div class="feature-card animate-on-scroll">
                        <div class="feature-icon">
                            <i class="fas fa-fire"></i>
                        </div>
                        <h3>Chống Cháy An Toàn B1</h3>
                        <p>Đạt tiêu chuẩn chống cháy B1 theo DIN 4102, tự tắt khi không có nguồn lửa, đảm bảo an toàn tuyệt đối cho công trình.</p>
                        <ul class="feature-benefits">
                            <li><i class="fas fa-check-circle"></i> Chuẩn chống cháy B1</li>
                            <li><i class="fas fa-check-circle"></i> Tự tắt khi hết nguồn lửa</li>
                            <li><i class="fas fa-check-circle"></i> Không tạo khí độc khi cháy</li>
                            <li><i class="fas fa-check-circle"></i> An toàn cho người sử dụng</li>
                        </ul>
                    </div>
                    
                    <div class="feature-card animate-on-scroll">
                        <div class="feature-icon">
                            <i class="fas fa-leaf"></i>
                        </div>
                        <h3>Thân Thiện Môi Trường</h3>
                        <p>Sản xuất không sử dụng CFC, HCFC theo công nghệ PU, hoàn toàn thân thiện với môi trường và tầng ozone, góp phần bảo vệ Trái đất xanh.</p>
                        <ul class="feature-benefits">
                            <li><i class="fas fa-check-circle"></i> Không chứa CFC, HCFC</li>
                            <li><i class="fas fa-check-circle"></i> Có thể tái chế</li>
                            <li><i class="fas fa-check-circle"></i> Không độc hại với con người</li>
                            <li><i class="fas fa-check-circle"></i> Bảo vệ tầng ozone</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Products Section -->
        <section class="products" id="products" style="background: var(--off-white); padding: 6rem 0; position: relative;">
            <div class="container">
                <div class="section-header animate-on-scroll">
                    <div class="section-badge">
                        <i class="fas fa-box-open"></i>
                        Sản phẩm
                    </div>
                    <h2 class="section-title">Dòng Sản Phẩm Gối Đỡ PU Foam</h2>
                    <p class="section-subtitle">Đa dạng các loại gối đỡ phù hợp với mọi nhu cầu công trình, từ dân dụng đến công nghiệp quy mô lớn</p>
                </div>

                <div class="products-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; margin-top: 4rem;">
                    <!-- Product 1: Gối đỡ vuông 2 mảnh -->
                    <div class="product-card animate-on-scroll" style="background: white; border-radius: 12px; padding: 2rem; box-shadow: 0 8px 32px rgba(10, 22, 40, 0.12); transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); position: relative; overflow: hidden; border: 1px solid #E9ECEF;">
                        <div class="product-badge" style="position: absolute; top: 16px; right: 16px; background: var(--primary-green); color: white; padding: 0.5rem 1rem; border-radius: 8px; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.05em; text-transform: uppercase;">
                            <i class="fas fa-star"></i> Phổ biến
                        </div>

                        <div class="product-icon" style="width: 100px; height: 100px; margin: 0 auto 1.5rem; background: rgba(148, 200, 66, 0.1); border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 3rem; color: #94C842;">
                            <i class="fas fa-cube"></i>
                        </div>

                        <h3 style="font-size: 1.5rem; font-weight: 800; color: #0A1628; margin-bottom: 1rem; text-align: center; font-family: 'Poppins', sans-serif; letter-spacing: -0.01em;">Gối Đỡ Vuông 2 Mảnh</h3>

                        <p style="color: #374151; text-align: center; margin-bottom: 1.5rem; line-height: 1.7;">Thiết kế module 2 mảnh thông minh, lắp đặt siêu nhanh chóng. Phù hợp cho các dự án quy mô lớn cần tiết kiệm thời gian thi công.</p>

                        <div class="product-specs" style="background: rgba(148, 200, 66, 0.05); padding: 1.5rem; border-radius: 12px; margin-bottom: 1.5rem; border: 1px solid rgba(148, 200, 66, 0.1);">
                            <h4 style="font-size: 1rem; color: #0A1628; margin-bottom: 1rem; font-weight: 700; font-family: 'Poppins', sans-serif;">
                                <i class="fas fa-info-circle" style="color: #94C842;"></i> Thông số kỹ thuật
                            </h4>
                            <ul style="list-style: none; padding: 0;">
                                <li style="display: flex; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px dashed #d1fae5;">
                                    <span style="color: #374151;">Đường kính ống:</span>
                                    <strong style="color: #94C842;">Ø21 - Ø219mm</strong>
                                </li>
                                <li style="display: flex; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px dashed #d1fae5;">
                                    <span style="color: #374151;">Độ dày:</span>
                                    <strong style="color: #94C842;">25 - 100mm</strong>
                                </li>
                                <li style="display: flex; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px dashed #d1fae5;">
                                    <span style="color: #374151;">Mật độ PU:</span>
                                    <strong style="color: #94C842;">40 kg/m³</strong>
                                </li>
                                <li style="display: flex; justify-content: space-between; padding: 0.5rem 0;">
                                    <span style="color: #374151;">Hệ số dẫn nhiệt:</span>
                                    <strong style="color: #94C842;">λ ≤ 0.022 W/m.K</strong>
                                </li>
                            </ul>
                        </div>

                        <div class="product-features" style="margin-bottom: 1.5rem;">
                            <div style="display: flex; align-items: center; gap: 0.8rem; margin-bottom: 0.8rem;">
                                <i class="fas fa-check-circle" style="color: #94C842; font-size: 1.1rem;"></i>
                                <span style="color: #374151;">Lắp đặt nhanh, tiết kiệm 70% thời gian</span>
                            </div>
                            <div style="display: flex; align-items: center; gap: 0.8rem; margin-bottom: 0.8rem;">
                                <i class="fas fa-check-circle" style="color: #94C842; font-size: 1.1rem;"></i>
                                <span style="color: #374151;">Chống thấm tuyệt đối < 1%</span>
                            </div>
                            <div style="display: flex; align-items: center; gap: 0.8rem;">
                                <i class="fas fa-check-circle" style="color: #94C842; font-size: 1.1rem;"></i>
                                <span style="color: #374151;">Chịu lực cao, không biến dạng</span>
                            </div>
                        </div>

                        <a href="#contact" class="product-btn" style="display: block; width: 100%; background: var(--primary-green); color: white; text-align: center; padding: 1rem; border-radius: 8px; text-decoration: none; font-weight: 700; transition: all 0.3s; box-shadow: 0 4px 16px rgba(148, 200, 66, 0.3); font-family: 'Poppins', sans-serif;">
                            <i class="fas fa-envelope"></i> Nhận Báo Giá Ngay
                        </a>
                    </div>

                    <!-- Product 2: Gối đỡ tròn có cùm -->
                    <div class="product-card animate-on-scroll" style="background: white; border-radius: 12px; padding: 2rem; box-shadow: 0 8px 32px rgba(10, 22, 40, 0.12); transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); position: relative; overflow: hidden; border: 2px solid #94C842;">
                        <div class="product-badge" style="position: absolute; top: 16px; right: 16px; background: var(--navy-dark); color: var(--primary-green); padding: 0.5rem 1rem; border-radius: 8px; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.05em; text-transform: uppercase;">
                            <i class="fas fa-crown"></i> Premium
                        </div>

                        <div class="product-icon" style="width: 100px; height: 100px; margin: 0 auto 1.5rem; background: var(--navy-dark); border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 3rem; color: #94C842;">
                            <i class="fas fa-circle"></i>
                        </div>

                        <h3 style="font-size: 1.5rem; font-weight: 800; color: #0A1628; margin-bottom: 1rem; text-align: center; font-family: 'Poppins', sans-serif; letter-spacing: -0.01em;">Gối Đỡ Tròn Cùm Kim Loại</h3>

                        <p style="color: #374151; text-align: center; margin-bottom: 1.5rem; line-height: 1.7;">Tích hợp cùm kim loại inox 304, siết chặt tối ưu. Phù hợp ống chịu áp lực cao, hệ thống chiller công nghiệp.</p>

                        <div class="product-specs" style="background: rgba(10, 22, 40, 0.05); padding: 1.5rem; border-radius: 12px; margin-bottom: 1.5rem; border: 1px solid rgba(10, 22, 40, 0.1);">
                            <h4 style="font-size: 1rem; color: #0A1628; margin-bottom: 1rem; font-weight: 700; font-family: 'Poppins', sans-serif;">
                                <i class="fas fa-info-circle" style="color: #94C842;"></i> Thông số kỹ thuật
                            </h4>
                            <ul style="list-style: none; padding: 0;">
                                <li style="display: flex; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px dashed rgba(10, 22, 40, 0.1);">
                                    <span style="color: #374151;">Đường kính ống:</span>
                                    <strong style="color: #0A1628;">Ø27 - Ø273mm</strong>
                                </li>
                                <li style="display: flex; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px dashed rgba(10, 22, 40, 0.1);">
                                    <span style="color: #374151;">Độ dày:</span>
                                    <strong style="color: #0A1628;">30 - 100mm</strong>
                                </li>
                                <li style="display: flex; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px dashed rgba(10, 22, 40, 0.1);">
                                    <span style="color: #374151;">Mật độ PU:</span>
                                    <strong style="color: #0A1628;">40 kg/m³</strong>
                                </li>
                                <li style="display: flex; justify-content: space-between; padding: 0.5rem 0;">
                                    <span style="color: #374151;">Cùm kim loại:</span>
                                    <strong style="color: #0A1628;">Inox 304</strong>
                                </li>
                            </ul>
                        </div>

                        <div class="product-features" style="margin-bottom: 1.5rem;">
                            <div style="display: flex; align-items: center; gap: 0.8rem; margin-bottom: 0.8rem;">
                                <i class="fas fa-check-circle" style="color: #94C842; font-size: 1.1rem;"></i>
                                <span style="color: #374151;">Ôm sát ống, cách nhiệt tối ưu</span>
                            </div>
                            <div style="display: flex; align-items: center; gap: 0.8rem; margin-bottom: 0.8rem;">
                                <i class="fas fa-check-circle" style="color: #94C842; font-size: 1.1rem;"></i>
                                <span style="color: #374151;">Cùm inox 304 bền bỉ chống gỉ</span>
                            </div>
                            <div style="display: flex; align-items: center; gap: 0.8rem;">
                                <i class="fas fa-check-circle" style="color: #94C842; font-size: 1.1rem;"></i>
                                <span style="color: #374151;">Chịu áp lực cao, rung động mạnh</span>
                            </div>
                        </div>

                        <a href="#contact" class="product-btn" style="display: block; width: 100%; background: var(--navy-dark); color: var(--primary-green); text-align: center; padding: 1rem; border-radius: 8px; text-decoration: none; font-weight: 700; transition: all 0.3s; box-shadow: 0 4px 16px rgba(10, 22, 40, 0.3); font-family: 'Poppins', sans-serif; border: 1px solid rgba(148, 200, 66, 0.3);">
                            <i class="fas fa-envelope"></i> Nhận Báo Giá Ngay
                        </a>
                    </div>

                </div>

                <!-- Product comparison table -->
                <div class="product-comparison" style="margin-top: 4rem; background: white; border-radius: 12px; padding: 2rem; box-shadow: 0 8px 32px rgba(10, 22, 40, 0.12); border: 1px solid #E9ECEF;">
                    <h3 style="font-size: 1.75rem; font-weight: 800; color: #0A1628; margin-bottom: 2rem; text-align: center; font-family: 'Poppins', sans-serif; letter-spacing: -0.01em;">
                        <i class="fas fa-balance-scale" style="color: #94C842;"></i> So Sánh Các Dòng Sản Phẩm
                    </h3>

                    <div style="overflow-x: auto;">
                        <table style="width: 100%; border-collapse: collapse; font-size: 0.95rem;">
                            <thead>
                                <tr style="background: var(--navy-dark); color: white;">
                                    <th style="padding: 1rem; text-align: left; border-radius: 8px 0 0 0; font-size: 1rem; font-weight: 700; font-family: 'Poppins', sans-serif;">Tiêu chí</th>
                                    <th style="padding: 1rem; text-align: center; font-size: 1rem; font-weight: 700; font-family: 'Poppins', sans-serif;">
                                        <i class="fas fa-cube"></i> Gối đỡ đế vuông
                                    </th>
                                    <th style="padding: 1rem; text-align: center; border-radius: 0 8px 0 0; font-size: 1rem; font-weight: 700; font-family: 'Poppins', sans-serif;">
                                        <i class="fas fa-circle"></i> Gối đỡ đế tròn
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="border-bottom: 1px solid #e5e7eb;">
                                    <td style="padding: 1rem; font-weight: 700; color: #0A1628;"><i class="fas fa-ruler" style="color: #94C842;"></i> Độ dày</td>
                                    <td style="padding: 1rem; text-align: center; color: #2D3748;">25 - 100mm</td>
                                    <td style="padding: 1rem; text-align: center; color: #2D3748;">30 - 100mm</td>
                                </tr>
                                <tr style="border-bottom: 1px solid #e5e7eb; background: rgba(148, 200, 66, 0.03);">
                                    <td style="padding: 1rem; font-weight: 700; color: #0A1628;"><i class="fas fa-clock" style="color: #94C842;"></i> Thời gian lắp đặt</td>
                                    <td style="padding: 1rem; text-align: center;"><i class="fas fa-bolt" style="color: #94C842;"></i> <strong style="color: #94C842;">Rất nhanh - 70% thời gian</strong></td>
                                    <td style="padding: 1rem; text-align: center; color: #2D3748;"><i class="fas fa-check" style="color: #94C842;"></i> Nhanh</td>
                                </tr>
                                <tr style="border-bottom: 1px solid #e5e7eb;">
                                    <td style="padding: 1rem; font-weight: 700; color: #0A1628;"><i class="fas fa-cogs" style="color: #94C842;"></i> Ứng dụng</td>
                                    <td style="padding: 1rem; text-align: center; color: #2D3748;">Mọi loại ống, Chiller, HVAC</td>
                                    <td style="padding: 1rem; text-align: center; color: #2D3748;">Ống áp lực cao, Chiller công nghiệp</td>
                                </tr>
                                <tr style="border-bottom: 1px solid #e5e7eb; background: rgba(148, 200, 66, 0.03);">
                                    <td style="padding: 1rem; font-weight: 700; color: #0A1628;"><i class="fas fa-fire" style="color: #94C842;"></i> Hệ số dẫn nhiệt</td>
                                    <td style="padding: 1rem; text-align: center;"><strong style="color: #94C842;">λ ≤ 0.022 W/m.K</strong></td>
                                    <td style="padding: 1rem; text-align: center;"><strong style="color: #0A1628;">λ ≤ 0.022 W/m.K</strong></td>
                                </tr>
                                <tr style="background: rgba(148, 200, 66, 0.03);">
                                    <td style="padding: 1rem; font-weight: 700; color: #0A1628;"><i class="fas fa-dollar-sign" style="color: #94C842;"></i> Giá thành</td>
                                    <td style="padding: 1rem; text-align: center;"><i class="fas fa-dollar-sign" style="color: #94C842;"></i> <strong style="color: #94C842;">Tốt nhất</strong></td>
                                    <td style="padding: 1rem; text-align: center;"><i class="fas fa-dollar-sign" style="color: #0A1628;"></i><i class="fas fa-dollar-sign" style="color: #0A1628;"></i> <strong style="color: #0A1628;">Premium</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- CTA Section -->
                <div style="margin-top: 3rem; text-align: center; background: rgba(148, 200, 66, 0.05); padding: 3rem; border-radius: 12px; border: 1px solid rgba(148, 200, 66, 0.1);">
                    <h3 style="font-size: 1.75rem; font-weight: 800; color: #0A1628; margin-bottom: 1rem; font-family: 'Poppins', sans-serif; letter-spacing: -0.01em;">
                        Chưa Chắc Chắn Sản Phẩm Nào Phù Hợp?
                    </h3>
                    <p style="color: #2D3748; font-size: 1.125rem; margin-bottom: 2rem; line-height: 1.7;">
                        Đội ngũ kỹ sư của chúng tôi sẵn sàng tư vấn miễn phí để giúp bạn lựa chọn giải pháp tối ưu nhất
                    </p>
                    <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                        <a href="tel:0973098338" style="display: inline-flex; align-items: center; gap: 0.75rem; background: var(--primary-green); color: white; padding: 1rem 2rem; border-radius: 8px; text-decoration: none; font-weight: 700; font-size: 1.05rem; box-shadow: 0 4px 16px rgba(148, 200, 66, 0.3); transition: all 0.3s; font-family: 'Poppins', sans-serif;">
                            <i class="fas fa-phone-alt"></i>
                            0973.098.338
                        </a>
                        <a href="#contact" style="display: inline-flex; align-items: center; gap: 0.75rem; background: white; color: var(--primary-green); padding: 1rem 2rem; border-radius: 8px; text-decoration: none; font-weight: 700; font-size: 1.05rem; box-shadow: 0 4px 16px rgba(10, 22, 40, 0.08); border: 2px solid var(--primary-green); transition: all 0.3s; font-family: 'Poppins', sans-serif;">
                            <i class="fas fa-envelope"></i>
                            Gửi Yêu Cầu Tư Vấn
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Technical Specifications -->
        <section class="specs">
            <div class="container">
                <div class="specs-content">
                    <div class="section-header animate-on-scroll">
                        <div class="section-badge">
                            <i class="fas fa-cogs"></i>
                            Thông số kỹ thuật
                        </div>
                        <h2 class="section-title" style="color: white;">Thông Số Kỹ Thuật Chi Tiết PU Foam</h2>
                        <p class="section-subtitle" style="color: rgba(255,255,255,0.9);">Các thông số kỹ thuật được kiểm định nghiêm ngặt theo tiêu chuẩn quốc tế PU Foam, đảm bảo chất lượng cao nhất cho sản phẩm.</p>
                    </div>

                    <div class="specs-grid">
                        <div class="spec-card animate-on-scroll">
                            <div class="spec-header">
                                <div class="spec-icon">🌡️</div>
                                <h4>Tính Chất Nhiệt PU</h4>
                            </div>
                            <ul class="spec-list">
                                <li><span>Hệ số dẫn nhiệt (λ) PU</span> <span class="spec-value">≤ 0.022 W/m.K</span></li>
                                <li><span>Hệ số dẫn nhiệt (λ) PUR</span> <span class="spec-value">≤ 0.028 W/m.K</span></li>
                                <li><span>Khoảng nhiệt độ sử dụng</span> <span class="spec-value">-196°C đến +120°C</span></li>
                                <li><span>Độ bền nhiệt</span> <span class="spec-value">Excellent</span></li>
                                <li><span>Hệ số giãn nở nhiệt</span> <span class="spec-value">0.05 mm/m.K</span></li>
                            </ul>
                        </div>

                        <div class="spec-card animate-on-scroll">
                            <div class="spec-header">
                                <div class="spec-icon">💪</div>
                                <h4>Tính Chất Cơ Học</h4>
                            </div>
                            <ul class="spec-list">
                                <li><span>Khối lượng riêng PU</span> <span class="spec-value">40 kg/m³</span></li>
                                <li><span>Khối lượng riêng PUR</span> <span class="spec-value">32-60 kg/m³</span></li>
                                <li><span>Sức chịu nén (10%)</span> <span class="spec-value">≥ 300 kPa</span></li>
                                <li><span>Độ bền kéo</span> <span class="spec-value">≥ 200 kPa</span></li>
                                <li><span>Độ đàn hồi</span> <span class="spec-value">Cao</span></li>
                            </ul>
                        </div>

                        <div class="spec-card animate-on-scroll">
                            <div class="spec-header">
                                <div class="spec-icon">💧</div>
                                <h4>Tính Chất Vật Lý</h4>
                            </div>
                            <ul class="spec-list">
                                <li><span>Độ hút nước (V/V)</span> <span class="spec-value">< 1%</span></li>
                                <li><span>Độ thấm hơi nước</span> <span class="spec-value">< 0.013 mg/m.h.Pa</span></li>
                                <li><span>Cấu trúc tế bào</span> <span class="spec-value">Ô kín > 95%</span></li>
                                <li><span>Độ ổn định kích thước</span> <span class="spec-value">< ±2%</span></li>
                                <li><span>Tuổi thọ sử dụng</span> <span class="spec-value">> 25 năm</span></li>
                            </ul>
                        </div>

                        <div class="spec-card animate-on-scroll">
                            <div class="spec-header">
                                <div class="spec-icon">🔥</div>
                                <h4>An Toàn & Môi Trường</h4>
                            </div>
                            <ul class="spec-list">
                                <li><span>Chuẩn chống cháy</span> <span class="spec-value">B1 (DIN 4102)</span></li>
                                <li><span>Khí thải độc</span> <span class="spec-value">Không</span></li>
                                <li><span>CFC/HCFC</span> <span class="spec-value">Không chứa</span></li>
                                <li><span>Tái chế được</span> <span class="spec-value">Có</span></li>
                                <li><span>Chứng nhận môi trường</span> <span class="spec-value">LEED</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Applications Section -->
        <section class="applications" id="applications">
            <div class="container">
                <div class="section-header animate-on-scroll">
                    <div class="section-badge">
                        <i class="fas fa-tools"></i>
                        Ứng dụng thực tế
                    </div>
                    <h2 class="section-title">Ứng Dụng Rộng Rãi Trong Công Nghiệp</h2>
                    <p class="section-subtitle">Gói đỡ PU Foam 3igreen được tin dùng trong nhiều lĩnh vực quan trọng, từ hệ thống lạnh công nghiệp đến các dự án dân dụng quy mô lớn, đặc biệt hiệu quả trong các ứng dụng yêu cầu cách nhiệt cao.</p>
                </div>
                
                <div class="app-grid">
                    <div class="app-item animate-on-scroll">
                        <div class="app-icon">
                            <i class="fas fa-snowflake"></i>
                        </div>
                        <h3>Hệ Thống Lạnh Trung Tâm</h3>
                        <p>Ứng dụng trong các hệ thống làm lạnh công nghiệp, đảm bảo hiệu suất tối ưu và tiết kiệm năng lượng với công nghệ PU Foam.</p>
                        <ul class="app-benefits">
                            <li><i class="fas fa-chevron-right"></i> Trung tâm thương mại, siêu thị</li>
                            <li><i class="fas fa-chevron-right"></i> Nhà máy sản xuất thực phẩm</li>
                            <li><i class="fas fa-chevron-right"></i> Kho lạnh công nghiệp</li>
                            <li><i class="fas fa-chevron-right"></i> Hệ thống lạnh y tế</li>
                        </ul>
                    </div>
                    
                    <div class="app-item animate-on-scroll">
                        <div class="app-icon">
                            <i class="fas fa-wind"></i>
                        </div>
                        <h3>Hệ Thống HVAC</h3>
                        <p>Tối ưu hóa hệ thống điều hòa không khí, giảm thất thoát nhiệt và tăng tuổi thọ thiết bị với vật liệu PU chất lượng cao.</p>
                        <ul class="app-benefits">
                            <li><i class="fas fa-chevron-right"></i> Tòa nhà văn phòng cao tầng</li>
                            <li><i class="fas fa-chevron-right"></i> Khách sạn, resort</li>
                            <li><i class="fas fa-chevron-right"></i> Bệnh viện, trường học</li>
                            <li><i class="fas fa-chevron-right"></i> Nhà xưởng công nghiệp</li>
                        </ul>
                    </div>
                    
                    <div class="app-item animate-on-scroll">
                        <div class="app-icon">
                            <i class="fas fa-industry"></i>
                        </div>
                    <h3>Hệ Thống Chiller Chuyên Nghiệp</h3>
                        <p>Ứng dụng trong các hệ thống chiller giải nhiệt nước từ 7°C đến 12°C, đảm bảo hiệu suất tối ưu và tiết kiệm năng lượng với công nghệ PU Foam cách nhiệt vượt trội.</p>
                        <ul class="app-benefits">
                            <li><i class="fas fa-chevron-right"></i> Hệ thống chiller giải nhiệt nước công nghiệp</li>
                            <li><i class="fas fa-chevron-right"></i> Chiller điều hòa trung tâm (7°C-12°C)</li>
                            <li><i class="fas fa-chevron-right"></i> Cách nhiệt ống chiller PHE INOX</li>
                            <li><i class="fas fa-chevron-right"></i> Tháp giải nhiệt Cooling Tower</li>
                        </ul>
                    </div>
                    
                    <div class="app-item animate-on-scroll">
                        <div class="app-icon">
                            <i class="fas fa-warehouse"></i>
                        </div>
                        <h3>Phòng Lạnh & Kho Đông</h3>
                        <p>Cách nhiệt hiệu quả cho các hệ thống làm lạnh ở nhiệt độ cực thấp, ứng dụng công nghệ PU chịu nhiệt độ xuống -196°C.</p>
                        <ul class="app-benefits">
                            <li><i class="fas fa-chevron-right"></i> Kho bảo quản thủy hải sản</li>
                            <li><i class="fas fa-chevron-right"></i> Nhà máy chế biến thức ăn đông lạnh</li>
                            <li><i class="fas fa-chevron-right"></i> Kho dược phẩm</li>
                            <li><i class="fas fa-chevron-right"></i> Phòng thí nghiệm sinh học</li>
                        </ul>
                    </div>
                    
                    <div class="app-item animate-on-scroll">
                        <div class="app-icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <h3>Ứng Dụng Dân Dụng</h3>
                        <p>Phục vụ các công trình dân dụng, mang lại sự thoải mái và tiết kiệm cho gia đình với vật liệu PU Foam an toàn.</p>
                        <ul class="app-benefits">
                            <li><i class="fas fa-chevron-right"></i> Căn hộ chung cư cao cấp</li>
                            <li><i class="fas fa-chevron-right"></i> Villa, biệt thự</li>
                            <li><i class="fas fa-chevron-right"></i> Nhà ở dân dụng</li>
                            <li><i class="fas fa-chevron-right"></i> Cửa hàng, showroom</li>
                        </ul>
                    </div>
                    
                    <div class="app-item animate-on-scroll">
                        <div class="app-icon">
                            <i class="fas fa-flask"></i>
                        </div>
                        <h3>Công Nghiệp Đặc Biệt</h3>
                        <p>Đáp ứng các yêu cầu khắt khe của những ngành công nghiệp có tính đặc thù cao với vật liệu PU chất lượng quốc tế.</p>
                        <ul class="app-benefits">
                            <li><i class="fas fa-chevron-right"></i> Ngành dược phẩm</li>
                            <li><i class="fas fa-chevron-right"></i> Công nghiệp điện tử</li>
                            <li><i class="fas fa-chevron-right"></i> Hóa chất cao cấp</li>
                            <li><i class="fas fa-chevron-right"></i> Công nghiệp ô tô</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Projects Section -->
        <section class="projects" id="projects">
            <div class="container">
                <div class="section-header animate-on-scroll">
                    <div class="section-badge">
                        <i class="fas fa-building"></i>
                        Dự án tiêu biểu
                    </div>
                    <h2 class="section-title">Dự Án Cách Nhiệt Chuyên Nghiệp</h2>
                    <p class="section-subtitle">3igreen tự hào đã thực hiện thành công nhiều dự án cách nhiệt lớn cho các nhà máy, tập đoàn hàng đầu với công nghệ PU Foam tiên tiến, tiết kiệm 70% thời gian thi công.</p>
                </div>
                
                <div class="projects-grid">
                    <div class="project-card animate-on-scroll">
                        <div class="project-image">
                            <img src="da1.jpg" alt="Project" style="width: 100%; height: 100%; object-fit: cover; position: absolute; top: 0; left: 0; z-index: 0;">
                            <div class="project-overlay">
                                <div class="project-stats">
                                    <div class="stat">
                                        <span class="stat-number">1,000</span>
                                        <span class="stat-label">Tỷ đồng</span>
                                    </div>
                                    <div class="stat">
                                        <span class="stat-number">16,000</span>
                                        <span class="stat-label">m² diện tích</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="project-content">
                            <div class="project-category">Nhà máy điện tử</div>
                            <h3>Nhà Máy Điện Tử Thông Minh Phenikaa</h3>
                            <p>Hệ thống cách nhiệt PU Foam cho nhà máy điện tử thông minh công suất 4.5 tỷ linh kiện/năm tại Khu Công nghệ cao Hòa Lạc, Hà Nội.</p>
                            <div class="project-features">
                                <span class="feature-tag">Cách nhiệt thông minh</span>
                                <span class="feature-tag">Tiêu chuẩn ISO</span>
                                <span class="feature-tag">Tiết kiệm năng lượng</span>
                            </div>
                            <div class="project-details">
                                <div class="detail-item">
                                    <i class="fas fa-calendar"></i>
                                    <span>2020-2022</span>
                                </div>
                                <div class="detail-item">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>Hà Nội</span>
                                </div>
                                <div class="detail-item">
                                    <i class="fas fa-industry"></i>
                                    <span>Điện tử</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="project-card animate-on-scroll">
                        <div class="project-image">
                            <img src="da1.jpg" alt="Project" style="width: 100%; height: 100%; object-fit: cover; position: absolute; top: 0; left: 0; z-index: 0;">
                            <div class="project-overlay">
                                <div class="project-stats">
                                    <div class="stat">
                                        <span class="stat-number">2</span>
                                        <span class="stat-label">Tỷ USD</span>
                                    </div>
                                    <div class="stat">
                                        <span class="stat-number">1,500</span>
                                        <span class="stat-label">MW công suất</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="project-content">
                            <div class="project-category">Nhà máy điện LNG</div>
                            <h3>Nhà Máy Nhiệt Điện LNG Nghi Sơn</h3>
                            <p>Hệ thống cách nhiệt chuyên nghiệp cho nhà máy nhiệt điện LNG công suất 1,500MW tại Khu kinh tế Nghi Sơn, Thanh Hóa.</p>
                            <div class="project-features">
                                <span class="feature-tag">Chiller system</span>
                                <span class="feature-tag">Cách nhiệt LNG</span>
                                <span class="feature-tag">Công nghệ Hàn Quốc</span>
                            </div>
                            <div class="project-details">
                                <div class="detail-item">
                                    <i class="fas fa-calendar"></i>
                                    <span>2027-2030</span>
                                </div>
                                <div class="detail-item">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>Thanh Hóa</span>
                                </div>
                                <div class="detail-item">
                                    <i class="fas fa-bolt"></i>
                                    <span>Năng lượng</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="project-card animate-on-scroll">
                        <div class="project-image">
                            <img src="da1.jpg" alt="Project" style="width: 100%; height: 100%; object-fit: cover; position: absolute; top: 0; left: 0; z-index: 0;">
                            <div class="project-overlay">
                                <div class="project-stats">
                                    <div class="stat">
                                        <span class="stat-number">25</span>
                                        <span class="stat-label">Triệu EUR</span>
                                    </div>
                                    <div class="stat">
                                        <span class="stat-number">16,000</span>
                                        <span class="stat-label">m² nhà xưởng</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="project-content">
                            <div class="project-category">Panel cách nhiệt</div>
                            <h3>Nhà Máy Panel Cách Nhiệt Kingspan</h3>
                            <p>Dự án cách nhiệt cho nhà máy sản xuất panel cách nhiệt cao cấp tiêu chuẩn LEED Platinum tại KCN Phú Mỹ II, Bà Rịa - Vũng Tàu.</p>
                            <div class="project-features">
                                <span class="feature-tag">LEED Platinum</span>
                                <span class="feature-tag">Panel PU</span>
                                <span class="feature-tag">Châu Âu</span>
                            </div>
                            <div class="project-details">
                                <div class="detail-item">
                                    <i class="fas fa-calendar"></i>
                                    <span>2022-2023</span>
                                </div>
                                <div class="detail-item">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>Bà Rịa - VT</span>
                                </div>
                                <div class="detail-item">
                                    <i class="fas fa-layer-group"></i>
                                    <span>Panel</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="project-card animate-on-scroll">
                        <div class="project-image">
                            <img src="da1.jpg" alt="Project" style="width: 100%; height: 100%; object-fit: cover; position: absolute; top: 0; left: 0; z-index: 0;">
                            <div class="project-overlay">
                                <div class="project-stats">
                                    <div class="stat">
                                        <span class="stat-number">2.2</span>
                                        <span class="stat-label">Tỷ USD</span>
                                    </div>
                                    <div class="stat">
                                        <span class="stat-number">1,200</span>
                                        <span class="stat-label">MW</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="project-content">
                            <div class="project-category">Nhiệt điện than</div>
                            <h3>Nhiệt Điện Than Vũng Áng II</h3>
                            <p>Hệ thống cách nhiệt tổng thể cho nhà máy nhiệt điện than công nghệ cao tại Hà Tĩnh với các tiêu chuẩn môi trường nghiêm ngặt.</p>
                            <div class="project-features">
                                <span class="feature-tag">Chiller công nghiệp</span>
                                <span class="feature-tag">Cooling tower</span>
                                <span class="feature-tag">Nhật - Hàn</span>
                            </div>
                            <div class="project-details">
                                <div class="detail-item">
                                    <i class="fas fa-calendar"></i>
                                    <span>2022-2025</span>
                                </div>
                                <div class="detail-item">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>Hà Tĩnh</span>
                                </div>
                                <div class="detail-item">
                                    <i class="fas fa-fire"></i>
                                    <span>Nhiệt điện</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="project-card animate-on-scroll">
                        <div class="project-image">
                            <img src="da1.jpg" alt="Project" style="width: 100%; height: 100%; object-fit: cover; position: absolute; top: 0; left: 0; z-index: 0;">
                            <div class="project-overlay">
                                <div class="project-stats">
                                    <div class="stat">
                                        <span class="stat-number">500</span>
                                        <span class="stat-label">Triệu VND</span>
                                    </div>
                                    <div class="stat">
                                        <span class="stat-number">8,000</span>
                                        <span class="stat-label">m² diện tích</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="project-content">
                            <div class="project-category">Trung tâm thương mại</div>
                            <h3>HVAC Trung Tâm Thương Mại</h3>
                            <p>Hệ thống HVAC cách nhiệt cho trung tâm thương mại quy mô lớn với công nghệ chiller tiết kiệm năng lượng vượt trội.</p>
                            <div class="project-features">
                                <span class="feature-tag">HVAC System</span>
                                <span class="feature-tag">Energy saving</span>
                                <span class="feature-tag">Smart control</span>
                            </div>
                            <div class="project-details">
                                <div class="detail-item">
                                    <i class="fas fa-calendar"></i>
                                    <span>2023-2024</span>
                                </div>
                                <div class="detail-item">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>TP.HCM</span>
                                </div>
                                <div class="detail-item">
                                    <i class="fas fa-store"></i>
                                    <span>Thương mại</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="project-card animate-on-scroll">
                        <div class="project-image">
                            <img src="da1.jpg" alt="Project" style="width: 100%; height: 100%; object-fit: cover; position: absolute; top: 0; left: 0; z-index: 0;">
                            <div class="project-overlay">
                                <div class="project-stats">
                                    <div class="stat">
                                        <span class="stat-number">300</span>
                                        <span class="stat-label">Triệu VND</span>
                                    </div>
                                    <div class="stat">
                                        <span class="stat-number">5,000</span>
                                        <span class="stat-label">m² kho lạnh</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="project-content">
                            <div class="project-category">Thực phẩm</div>
                            <h3>Kho Lạnh Thực Phẩm Công Nghiệp</h3>
                            <p>Hệ thống cách nhiệt chuyên dụng cho kho lạnh thực phẩm với nhiệt độ -25°C, đảm bảo chất lượng bảo quản tối ưu.</p>
                            <div class="project-features">
                                <span class="feature-tag">Cold storage</span>
                                <span class="feature-tag">-25°C</span>
                                <span class="feature-tag">Food grade</span>
                            </div>
                            <div class="project-details">
                                <div class="detail-item">
                                    <i class="fas fa-calendar"></i>
                                    <span>2023</span>
                                </div>
                                <div class="detail-item">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>Đồng Nai</span>
                                </div>
                                <div class="detail-item">
                                    <i class="fas fa-snowflake"></i>
                                    <span>Thực phẩm</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="projects-cta animate-on-scroll">
                    <h3>Bạn có dự án cần tư vấn cách nhiệt?</h3>
                    <p>Liên hệ ngay với chúng tôi để nhận tư vấn miễn phí và báo giá tốt nhất</p>
                    <a href="#contact" class="btn btn-primary">
                        <i class="fas fa-phone"></i>
                        Tư vấn dự án miễn phí
                    </a>
                </div>
            </div>
        </section>

        <!-- News & Blog Section -->
        <section class="news" id="news" style="padding: 5rem 0; background: white;">
            <div class="container">
                <div class="section-header animate-on-scroll">
                    <div class="section-badge">
                        <i class="fas fa-newspaper"></i>
                        Tin tức & Blog
                    </div>
                    <h2 class="section-title">Tin Tức Mới Nhất</h2>
                    <p class="section-subtitle">Cập nhật tin tức, kiến thức và xu hướng công nghệ vật liệu xanh mới nhất</p>
                </div>

                <div class="news-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 2.5rem; margin-top: 3rem;">
                    <!-- News 1 -->
                    <article class="news-card animate-on-scroll" style="background: white; border-radius: 25px; overflow: hidden; box-shadow: 0 20px 40px rgba(148, 200, 66, 0.12); transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);">
                        <div class="news-image" style="width: 100%; height: 250px; position: relative; overflow: hidden;">
                            <img src="6.jpg" alt="News 1" style="width: 100%; height: 100%; object-fit: cover;">
                            <div style="position: absolute; top: 20px; left: 20px; background: rgba(255,255,255,0.95); padding: 0.5rem 1rem; border-radius: 50px; font-size: 0.85rem; font-weight: 600; color: #94C842;">
                                <i class="fas fa-calendar"></i> 01/12/2024
                            </div>
                        </div>
                        <div style="padding: 2rem;">
                            <div style="display: flex; gap: 0.8rem; margin-bottom: 1rem;">
                                <span style="background: #f7fce8; color: #94C842; padding: 0.4rem 1rem; border-radius: 50px; font-size: 0.85rem; font-weight: 600;">Công nghệ</span>
                                <span style="background: #fff5f0; color: #FF6B35; padding: 0.4rem 1rem; border-radius: 50px; font-size: 0.85rem; font-weight: 600;">Xu hướng</span>
                            </div>
                            <h3 style="font-size: 1.4rem; font-weight: 700; color: #2d3436; margin-bottom: 1rem; line-height: 1.4;">
                                Công Nghệ PU Foam Thế Hệ Mới - Tiết Kiệm 70% Thời Gian Thi Công
                            </h3>
                            <p style="color: #374151; line-height: 1.7; margin-bottom: 1.5rem;">
                                Khám phá công nghệ PU Foam tiên tiến giúp tiết kiệm thời gian thi công lên đến 70%, mang lại hiệu quả vượt trội cho các công trình công nghiệp...
                            </p>
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <div style="display: flex; align-items: center; gap: 0.8rem;">
                                    <div style="width: 40px; height: 40px; background: linear-gradient(135deg, #94C842, #B5E550); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 700;">
                                        A
                                    </div>
                                    <div>
                                        <div style="font-weight: 600; color: #2d3436; font-size: 0.9rem;">Admin 3iGreen</div>
                                        <div style="font-size: 0.8rem; color: #b2bec3;">5 phút đọc</div>
                                    </div>
                                </div>
                                <a href="#" style="color: #94C842; font-weight: 600; text-decoration: none; display: flex; align-items: center; gap: 0.5rem;">
                                    Đọc thêm <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </article>

                    <!-- News 2 -->
                    <article class="news-card animate-on-scroll" style="background: white; border-radius: 25px; overflow: hidden; box-shadow: 0 20px 40px rgba(148, 200, 66, 0.12); transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);">
                        <div class="news-image" style="width: 100%; height: 250px; position: relative; overflow: hidden;">
                            <img src="6.jpg" alt="News 2" style="width: 100%; height: 100%; object-fit: cover;">
                            <div style="position: absolute; top: 20px; left: 20px; background: rgba(255,255,255,0.95); padding: 0.5rem 1rem; border-radius: 50px; font-size: 0.85rem; font-weight: 600; color: #FFD93D;">
                                <i class="fas fa-calendar"></i> 28/11/2024
                            </div>
                        </div>
                        <div style="padding: 2rem;">
                            <div style="display: flex; gap: 0.8rem; margin-bottom: 1rem;">
                                <span style="background: #fffbeb; color: #FFD93D; padding: 0.4rem 1rem; border-radius: 50px; font-size: 0.85rem; font-weight: 600;">Giải thưởng</span>
                            </div>
                            <h3 style="font-size: 1.4rem; font-weight: 700; color: #2d3436; margin-bottom: 1rem; line-height: 1.4;">
                                3iGreen Nhận Giải Thưởng "Doanh Nghiệp Xanh 2024"
                            </h3>
                            <p style="color: #374151; line-height: 1.7; margin-bottom: 1.5rem;">
                                3iGreen vinh dự được vinh danh tại lễ trao giải "Doanh Nghiệp Xanh 2024" nhờ những đóng góp xuất sắc trong lĩnh vực phát triển vật liệu bền vững...
                            </p>
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <div style="display: flex; align-items: center; gap: 0.8rem;">
                                    <div style="width: 40px; height: 40px; background: linear-gradient(135deg, #FFD93D, #FFA372); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 700;">
                                        3i
                                    </div>
                                    <div>
                                        <div style="font-weight: 600; color: #2d3436; font-size: 0.9rem;">3iGreen Team</div>
                                        <div style="font-size: 0.8rem; color: #b2bec3;">4 phút đọc</div>
                                    </div>
                                </div>
                                <a href="#" style="color: #FFD93D; font-weight: 600; text-decoration: none; display: flex; align-items: center; gap: 0.5rem;">
                                    Đọc thêm <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </article>

                    <!-- News 3 -->
                    <article class="news-card animate-on-scroll" style="background: white; border-radius: 25px; overflow: hidden; box-shadow: 0 20px 40px rgba(148, 200, 66, 0.12); transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);">
                        <div class="news-image" style="width: 100%; height: 250px; position: relative; overflow: hidden;">
                            <img src="6.jpg" alt="News 3" style="width: 100%; height: 100%; object-fit: cover;">
                            <div style="position: absolute; top: 20px; left: 20px; background: rgba(255,255,255,0.95); padding: 0.5rem 1rem; border-radius: 50px; font-size: 0.85rem; font-weight: 600; color: #FF6B35;">
                                <i class="fas fa-calendar"></i> 20/11/2024
                            </div>
                        </div>
                        <div style="padding: 2rem;">
                            <div style="display: flex; gap: 0.8rem; margin-bottom: 1rem;">
                                <span style="background: #fff5f0; color: #FF6B35; padding: 0.4rem 1rem; border-radius: 50px; font-size: 0.85rem; font-weight: 600;">Hướng dẫn</span>
                            </div>
                            <h3 style="font-size: 1.4rem; font-weight: 700; color: #2d3436; margin-bottom: 1rem; line-height: 1.4;">
                                5 Bí Quyết Chọn Vật Liệu Cách Nhiệt Hiệu Quả
                            </h3>
                            <p style="color: #374151; line-height: 1.7; margin-bottom: 1.5rem;">
                                Hướng dẫn chi tiết giúp bạn lựa chọn vật liệu cách nhiệt phù hợp nhất cho công trình, tiết kiệm chi phí và đảm bảo hiệu suất tối ưu...
                            </p>
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <div style="display: flex; align-items: center; gap: 0.8rem;">
                                    <div style="width: 40px; height: 40px; background: linear-gradient(135deg, #FF6B35, #FFD93D); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 700;">
                                        KT
                                    </div>
                                    <div>
                                        <div style="font-weight: 600; color: #2d3436; font-size: 0.9rem;">Chuyên gia kỹ thuật</div>
                                        <div style="font-size: 0.8rem; color: #b2bec3;">7 phút đọc</div>
                                    </div>
                                </div>
                                <a href="#" style="color: #FF6B35; font-weight: 600; text-decoration: none; display: flex; align-items: center; gap: 0.5rem;">
                                    Đọc thêm <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- View More Button -->
                <div style="text-align: center; margin-top: 3rem;">
                    <a href="#" style="display: inline-flex; align-items: center; gap: 1rem; background: linear-gradient(135deg, #94C842, #B5E550); color: white; padding: 1.2rem 3rem; border-radius: 50px; text-decoration: none; font-weight: 600; font-size: 1.1rem; box-shadow: 0 15px 35px rgba(148, 200, 66, 0.3); transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);">
                        <i class="fas fa-newspaper"></i>
                        Xem tất cả tin tức
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </section>

        <!-- Support Tools Section -->
        <section class="support-tools" id="support" style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #334155 100%); padding: 6rem 0; position: relative; overflow: hidden;">
            <!-- Animated Background Pattern -->
            <div style="position: absolute; inset: 0; opacity: 0.05; background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 40px 40px;"></div>

            <!-- Floating Elements -->
            <div style="position: absolute; top: 10%; left: 5%; width: 300px; height: 300px; background: radial-gradient(circle, rgba(148, 200, 66, 0.15), transparent); border-radius: 50%; filter: blur(60px); animation: float-slow 20s ease-in-out infinite;"></div>
            <div style="position: absolute; bottom: 10%; right: 5%; width: 400px; height: 400px; background: radial-gradient(circle, rgba(255, 217, 61, 0.1), transparent); border-radius: 50%; filter: blur(80px); animation: float-slow 25s ease-in-out infinite 5s;"></div>

            <div class="container" style="position: relative; z-index: 2;">
                <div class="section-header animate-on-scroll" style="margin-bottom: 4rem;">
                    <div class="section-badge" style="background: linear-gradient(135deg, #94C842, #FFD93D); display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.6rem 1.5rem; border-radius: 50px; font-size: 0.9rem; font-weight: 600; margin-bottom: 1.5rem; box-shadow: 0 10px 30px rgba(148, 200, 66, 0.3);">
                        <i class="fas fa-calculator" style="font-size: 1.1rem;"></i>
                        <span style="color: white;">Công cụ hỗ trợ chuyên nghiệp</span>
                    </div>
                    <h2 class="section-title" style="color: white; font-size: 3rem; margin-bottom: 1.5rem;">
                        <span style="background: linear-gradient(135deg, #94C842, #FFD93D); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">3iCalc</span> - Tính Toán Cách Nhiệt
                    </h2>
                    <p class="section-subtitle" style="color: rgba(255, 255, 255, 0.8); font-size: 1.2rem; max-width: 800px; margin: 0 auto; line-height: 1.8;">
                        Phần mềm tính toán cách nhiệt chuyên nghiệp được phát triển bởi 3igreen, hỗ trợ kỹ sư thiết kế và nhà thầu tính toán chính xác độ dày cách nhiệt kinh tế nhất.
                    </p>
                </div>

                <!-- Why Calculate Section -->
                <div class="calc-intro animate-on-scroll" style="background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 30px; padding: 3rem; margin-bottom: 4rem;">
                    <div style="text-align: center; margin-bottom: 2.5rem;">
                        <div style="display: inline-flex; align-items: center; gap: 0.8rem; background: rgba(148, 200, 66, 0.1); padding: 0.8rem 1.8rem; border-radius: 50px; margin-bottom: 1.5rem;">
                            <i class="fas fa-question-circle" style="color: #94C842; font-size: 1.3rem;"></i>
                            <span style="color: #FFD93D; font-weight: 600; font-size: 0.95rem;">Tại sao cần tính toán?</span>
                        </div>
                        <h3 style="color: white; font-size: 2rem; margin-bottom: 1rem; font-weight: 700;">Tính Toán Độ Dày Cách Nhiệt Chính Xác</h3>
                        <p style="color: rgba(255, 255, 255, 0.7); font-size: 1.05rem; max-width: 700px; margin: 0 auto; line-height: 1.7;">
                            Việc lựa chọn đúng độ dày bảo ôn sẽ <strong style="color: #94C842;">ngăn chặn hiệu quả sự đọng sương, giảm thất thoát năng lượng, tối ưu chi phí vận hành</strong> cho chủ đầu tư.
                        </p>
                    </div>

                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem; margin-top: 2.5rem;">
                        <div style="background: rgba(148, 200, 66, 0.1); border: 1px solid rgba(148, 200, 66, 0.3); border-radius: 20px; padding: 1.8rem; text-align: center; transition: all 0.3s;">
                            <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #94C842, #B5E550); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; box-shadow: 0 10px 25px rgba(148, 200, 66, 0.3);">
                                <i class="fas fa-thermometer-half" style="color: white; font-size: 1.8rem;"></i>
                            </div>
                            <h4 style="color: white; font-size: 1rem; margin-bottom: 0.5rem; font-weight: 600;">Nhiệt độ môi trường</h4>
                            <div style="display: inline-block; background: rgba(255, 217, 61, 0.2); color: #FFD93D; padding: 0.3rem 0.8rem; border-radius: 20px; font-size: 0.75rem; font-weight: 600; margin-bottom: 0.8rem;">Ảnh hưởng vừa</div>
                            <p style="color: rgba(255, 255, 255, 0.6); font-size: 0.9rem; line-height: 1.5;">Chênh lệch nhiệt độ trong/ngoài ống</p>
                        </div>

                        <div style="background: rgba(255, 107, 53, 0.1); border: 1px solid rgba(255, 107, 53, 0.3); border-radius: 20px; padding: 1.8rem; text-align: center; transition: all 0.3s;">
                            <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #FF6B35, #FFA372); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; box-shadow: 0 10px 25px rgba(255, 107, 53, 0.3);">
                                <i class="fas fa-tint" style="color: white; font-size: 1.8rem;"></i>
                            </div>
                            <h4 style="color: white; font-size: 1rem; margin-bottom: 0.5rem; font-weight: 600;">Độ ẩm môi trường</h4>
                            <div style="display: inline-block; background: rgba(255, 107, 53, 0.2); color: #FF6B35; padding: 0.3rem 0.8rem; border-radius: 20px; font-size: 0.75rem; font-weight: 600; margin-bottom: 0.8rem;">Ảnh hưởng rất lớn</div>
                            <p style="color: rgba(255, 255, 255, 0.6); font-size: 0.9rem; line-height: 1.5;">Độ ẩm xung quanh hệ thống</p>
                        </div>

                        <div style="background: rgba(255, 217, 61, 0.1); border: 1px solid rgba(255, 217, 61, 0.3); border-radius: 20px; padding: 1.8rem; text-align: center; transition: all 0.3s;">
                            <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #FFD93D, #FFA372); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; box-shadow: 0 10px 25px rgba(255, 217, 61, 0.3);">
                                <i class="fas fa-fire" style="color: white; font-size: 1.8rem;"></i>
                            </div>
                            <h4 style="color: white; font-size: 1rem; margin-bottom: 0.5rem; font-weight: 600;">Hệ số dẫn nhiệt</h4>
                            <div style="display: inline-block; background: rgba(255, 217, 61, 0.2); color: #FFD93D; padding: 0.3rem 0.8rem; border-radius: 20px; font-size: 0.75rem; font-weight: 600; margin-bottom: 0.8rem;">Ảnh hưởng lớn</div>
                            <p style="color: rgba(255, 255, 255, 0.6); font-size: 0.9rem; line-height: 1.5;">Của vật liệu bảo ôn PU Foam</p>
                        </div>

                        <div style="background: rgba(148, 200, 66, 0.1); border: 1px solid rgba(148, 200, 66, 0.3); border-radius: 20px; padding: 1.8rem; text-align: center; transition: all 0.3s;">
                            <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #78A82E, #94C842); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; box-shadow: 0 10px 25px rgba(120, 168, 46, 0.3);">
                                <i class="fas fa-shield-alt" style="color: white; font-size: 1.8rem;"></i>
                            </div>
                            <h4 style="color: white; font-size: 1rem; margin-bottom: 0.5rem; font-weight: 600;">Vật liệu Jacketing</h4>
                            <div style="display: inline-block; background: rgba(148, 200, 66, 0.2); color: #94C842; padding: 0.3rem 0.8rem; border-radius: 20px; font-size: 0.75rem; font-weight: 600; margin-bottom: 0.8rem;">Ảnh hưởng lớn</div>
                            <p style="color: rgba(255, 255, 255, 0.6); font-size: 0.9rem; line-height: 1.5;">Vật liệu bảo vệ Cladding</p>
                        </div>

                        <div style="background: rgba(255, 217, 61, 0.1); border: 1px solid rgba(255, 217, 61, 0.3); border-radius: 20px; padding: 1.8rem; text-align: center; transition: all 0.3s;">
                            <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #FFD93D, #94C842); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; box-shadow: 0 10px 25px rgba(255, 217, 61, 0.3);">
                                <i class="fas fa-wind" style="color: white; font-size: 1.8rem;"></i>
                            </div>
                            <h4 style="color: white; font-size: 1rem; margin-bottom: 0.5rem; font-weight: 600;">Tốc độ gió</h4>
                            <div style="display: inline-block; background: rgba(255, 217, 61, 0.2); color: #FFD93D; padding: 0.3rem 0.8rem; border-radius: 20px; font-size: 0.75rem; font-weight: 600; margin-bottom: 0.8rem;">Ảnh hưởng nhiều</div>
                            <p style="color: rgba(255, 255, 255, 0.6); font-size: 0.9rem; line-height: 1.5;">Gió môi trường xung quanh</p>
                        </div>
                    </div>
                </div>

                <!-- Calculator Tools Grid -->
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 2rem; margin-bottom: 4rem;">
                    <!-- Tool 1: Ống gió -->
                    <div class="calc-tool animate-on-scroll" style="background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(10px); border: 1px solid rgba(148, 200, 66, 0.2); border-radius: 25px; padding: 2.5rem; transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1); position: relative; overflow: hidden;">
                        <div style="position: absolute; top: -50px; right: -50px; width: 150px; height: 150px; background: radial-gradient(circle, rgba(148, 200, 66, 0.15), transparent); border-radius: 50%; filter: blur(40px);"></div>

                        <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #94C842, #FFD93D); border-radius: 20px; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem; box-shadow: 0 15px 35px rgba(148, 200, 66, 0.3); transition: transform 0.5s;">
                            <i class="fas fa-wind" style="color: white; font-size: 2.2rem;"></i>
                        </div>

                        <h3 style="color: white; font-size: 1.4rem; margin-bottom: 1rem; font-weight: 700;">Ống Gió HVAC</h3>
                        <p style="color: rgba(255, 255, 255, 0.7); margin-bottom: 1.5rem; line-height: 1.6; font-size: 0.95rem;">Tính toán độ dày cách nhiệt tối ưu cho hệ thống ống gió, ngăn ngừa đọng sương hiệu quả.</p>

                        <div style="margin-bottom: 2rem;">
                            <div style="display: flex; align-items: center; gap: 0.8rem; margin-bottom: 0.8rem;">
                                <i class="fas fa-check-circle" style="color: #94C842; font-size: 1.1rem;"></i>
                                <span style="color: rgba(255, 255, 255, 0.8); font-size: 0.9rem;">Theo tiêu chuẩn ASHRAE</span>
                            </div>
                            <div style="display: flex; align-items: center; gap: 0.8rem; margin-bottom: 0.8rem;">
                                <i class="fas fa-check-circle" style="color: #FFD93D; font-size: 1.1rem;"></i>
                                <span style="color: rgba(255, 255, 255, 0.8); font-size: 0.9rem;">Phân tích kinh tế chi phí</span>
                            </div>
                            <div style="display: flex; align-items: center; gap: 0.8rem;">
                                <i class="fas fa-check-circle" style="color: #FF6B35; font-size: 1.1rem;"></i>
                                <span style="color: rgba(255, 255, 255, 0.8); font-size: 0.9rem;">Báo cáo kỹ thuật chi tiết</span>
                            </div>
                        </div>

                        <button onclick="openCalculator('duct')" style="width: 100%; background: linear-gradient(135deg, #94C842, #FFD93D); color: white; border: none; padding: 1rem 1.5rem; border-radius: 15px; font-weight: 600; cursor: pointer; transition: all 0.3s; display: flex; align-items: center; justify-content: center; gap: 0.8rem; font-size: 1rem; box-shadow: 0 10px 25px rgba(148, 200, 66, 0.3);">
                            <i class="fas fa-calculator"></i>
                            <span>Tính toán ngay</span>
                        </button>
                    </div>

                    <!-- Tool 2: Nước nóng -->
                    <div class="calc-tool animate-on-scroll" style="background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(10px); border: 1px solid rgba(255, 107, 53, 0.2); border-radius: 25px; padding: 2.5rem; transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1); position: relative; overflow: hidden;">
                        <div style="position: absolute; top: -50px; right: -50px; width: 150px; height: 150px; background: radial-gradient(circle, rgba(255, 107, 53, 0.15), transparent); border-radius: 50%; filter: blur(40px);"></div>

                        <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #FF6B35, #FFA372); border-radius: 20px; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem; box-shadow: 0 15px 35px rgba(255, 107, 53, 0.3); transition: transform 0.5s;">
                            <i class="fas fa-thermometer-half" style="color: white; font-size: 2.2rem;"></i>
                        </div>

                        <h3 style="color: white; font-size: 1.4rem; margin-bottom: 1rem; font-weight: 700;">Đường Ống Nước Nóng</h3>
                        <p style="color: rgba(255, 255, 255, 0.7); margin-bottom: 1.5rem; line-height: 1.6; font-size: 0.95rem;">Tính tổn thất nhiệt và độ dày cách nhiệt kinh tế cho hệ thống nước nóng.</p>

                        <div style="margin-bottom: 2rem;">
                            <div style="display: flex; align-items: center; gap: 0.8rem; margin-bottom: 0.8rem;">
                                <i class="fas fa-check-circle" style="color: #FF6B35; font-size: 1.1rem;"></i>
                                <span style="color: rgba(255, 255, 255, 0.8); font-size: 0.9rem;">Tính tổn thất nhiệt chính xác</span>
                            </div>
                            <div style="display: flex; align-items: center; gap: 0.8rem; margin-bottom: 0.8rem;">
                                <i class="fas fa-check-circle" style="color: #FFD93D; font-size: 1.1rem;"></i>
                                <span style="color: rgba(255, 255, 255, 0.8); font-size: 0.9rem;">Tối ưu chi phí vận hành</span>
                            </div>
                            <div style="display: flex; align-items: center; gap: 0.8rem;">
                                <i class="fas fa-check-circle" style="color: #94C842; font-size: 1.1rem;"></i>
                                <span style="color: rgba(255, 255, 255, 0.8); font-size: 0.9rem;">Nhiều loại vật liệu PU Foam</span>
                            </div>
                        </div>

                        <button onclick="openCalculator('hotwater')" style="width: 100%; background: linear-gradient(135deg, #FF6B35, #FFA372); color: white; border: none; padding: 1rem 1.5rem; border-radius: 15px; font-weight: 600; cursor: pointer; transition: all 0.3s; display: flex; align-items: center; justify-content: center; gap: 0.8rem; font-size: 1rem; box-shadow: 0 10px 25px rgba(255, 107, 53, 0.3);">
                            <i class="fas fa-calculator"></i>
                            <span>Tính toán ngay</span>
                        </button>
                    </div>

                    <!-- Tool 3: Tanks -->
                    <div class="calc-tool animate-on-scroll" style="background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(10px); border: 1px solid rgba(255, 217, 61, 0.2); border-radius: 25px; padding: 2.5rem; transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1); position: relative; overflow: hidden;">
                        <div style="position: absolute; top: -50px; right: -50px; width: 150px; height: 150px; background: radial-gradient(circle, rgba(255, 217, 61, 0.15), transparent); border-radius: 50%; filter: blur(40px);"></div>

                        <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #FFD93D, #FFA372); border-radius: 20px; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem; box-shadow: 0 15px 35px rgba(255, 217, 61, 0.3); transition: transform 0.5s;">
                            <i class="fas fa-database" style="color: white; font-size: 2.2rem;"></i>
                        </div>

                        <h3 style="color: white; font-size: 1.4rem; margin-bottom: 1rem; font-weight: 700;">Tanks & Bồn Chứa</h3>
                        <p style="color: rgba(255, 255, 255, 0.7); margin-bottom: 1.5rem; line-height: 1.6; font-size: 0.95rem;">Tính toán cách nhiệt cho bồn chứa với các hình dạng và kích thước khác nhau.</p>

                        <div style="margin-bottom: 2rem;">
                            <div style="display: flex; align-items: center; gap: 0.8rem; margin-bottom: 0.8rem;">
                                <i class="fas fa-check-circle" style="color: #FFD93D; font-size: 1.1rem;"></i>
                                <span style="color: rgba(255, 255, 255, 0.8); font-size: 0.9rem;">Bồn cylindrical & spherical</span>
                            </div>
                            <div style="display: flex; align-items: center; gap: 0.8rem; margin-bottom: 0.8rem;">
                                <i class="fas fa-check-circle" style="color: #FF6B35; font-size: 1.1rem;"></i>
                                <span style="color: rgba(255, 255, 255, 0.8); font-size: 0.9rem;">Tính diện tích bề mặt</span>
                            </div>
                            <div style="display: flex; align-items: center; gap: 0.8rem;">
                                <i class="fas fa-check-circle" style="color: #94C842; font-size: 1.1rem;"></i>
                                <span style="color: rgba(255, 255, 255, 0.8); font-size: 0.9rem;">Phân tích ROI chi tiết</span>
                            </div>
                        </div>

                        <button onclick="openCalculator('tanks')" style="width: 100%; background: linear-gradient(135deg, #FFD93D, #FFA372); color: white; border: none; padding: 1rem 1.5rem; border-radius: 15px; font-weight: 600; cursor: pointer; transition: all 0.3s; display: flex; align-items: center; justify-content: center; gap: 0.8rem; font-size: 1rem; box-shadow: 0 10px 25px rgba(255, 217, 61, 0.3);">
                            <i class="fas fa-calculator"></i>
                            <span>Tính toán ngay</span>
                        </button>
                    </div>

                    <!-- Tool 4: Chiller -->
                    <div class="calc-tool animate-on-scroll" style="background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(10px); border: 1px solid rgba(148, 200, 66, 0.2); border-radius: 25px; padding: 2.5rem; transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1); position: relative; overflow: hidden;">
                        <div style="position: absolute; top: -50px; right: -50px; width: 150px; height: 150px; background: radial-gradient(circle, rgba(148, 200, 66, 0.15), transparent); border-radius: 50%; filter: blur(40px);"></div>

                        <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #78A82E, #94C842); border-radius: 20px; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem; box-shadow: 0 15px 35px rgba(120, 168, 46, 0.3); transition: transform 0.5s;">
                            <i class="fas fa-snowflake" style="color: white; font-size: 2.2rem;"></i>
                        </div>

                        <h3 style="color: white; font-size: 1.4rem; margin-bottom: 1rem; font-weight: 700;">Ống Chiller Lạnh</h3>
                        <p style="color: rgba(255, 255, 255, 0.7); margin-bottom: 1.5rem; line-height: 1.6; font-size: 0.95rem;">Chuyên biệt cho hệ thống chiller, ngăn ngừa đọng sương 100% hiệu quả.</p>

                        <div style="margin-bottom: 2rem;">
                            <div style="display: flex; align-items: center; gap: 0.8rem; margin-bottom: 0.8rem;">
                                <i class="fas fa-check-circle" style="color: #94C842; font-size: 1.1rem;"></i>
                                <span style="color: rgba(255, 255, 255, 0.8); font-size: 0.9rem;">Ngăn đọng sương 100%</span>
                            </div>
                            <div style="display: flex; align-items: center; gap: 0.8rem; margin-bottom: 0.8rem;">
                                <i class="fas fa-check-circle" style="color: #FFD93D; font-size: 1.1rem;"></i>
                                <span style="color: rgba(255, 255, 255, 0.8); font-size: 0.9rem;">Tối ưu nhiệt độ thấp</span>
                            </div>
                            <div style="display: flex; align-items: center; gap: 0.8rem;">
                                <i class="fas fa-check-circle" style="color: #FF6B35; font-size: 1.1rem;"></i>
                                <span style="color: rgba(255, 255, 255, 0.8); font-size: 0.9rem;">Phù hợp vật liệu PU Foam</span>
                            </div>
                        </div>

                        <button onclick="openCalculator('chiller')" style="width: 100%; background: linear-gradient(135deg, #78A82E, #94C842); color: white; border: none; padding: 1rem 1.5rem; border-radius: 15px; font-weight: 600; cursor: pointer; transition: all 0.3s; display: flex; align-items: center; justify-content: center; gap: 0.8rem; font-size: 1rem; box-shadow: 0 10px 25px rgba(120, 168, 46, 0.3);">
                            <i class="fas fa-calculator"></i>
                            <span>Tính toán ngay</span>
                        </button>
                    </div>
                </div>

                <!-- Benefits Section -->
                <div class="calc-benefits animate-on-scroll" style="margin-bottom: 4rem;">
                    <h3 style="color: white; font-size: 2.2rem; text-align: center; margin-bottom: 3rem; font-weight: 700;">
                        <span style="color: #FFD93D;">Lợi Ích</span> Của 3iCalc
                    </h3>
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 2rem;">
                        <div style="background: rgba(148, 200, 66, 0.1); border: 1px solid rgba(148, 200, 66, 0.2); border-radius: 20px; padding: 2rem; display: flex; align-items: flex-start; gap: 1.5rem; transition: all 0.4s;">
                            <div style="width: 70px; height: 70px; background: linear-gradient(135deg, #94C842, #FFD93D); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; box-shadow: 0 10px 25px rgba(148, 200, 66, 0.3);">
                                <i class="fas fa-coins" style="color: white; font-size: 2rem;"></i>
                            </div>
                            <div>
                                <h4 style="color: white; font-size: 1.3rem; margin-bottom: 0.8rem; font-weight: 700;">Tối Ưu Chi Phí</h4>
                                <p style="color: rgba(255, 255, 255, 0.7); line-height: 1.6; font-size: 0.95rem;">Cân nhắc chi phí đầu tư ban đầu và vận hành hàng năm để đưa ra độ dày kinh tế nhất</p>
                            </div>
                        </div>

                        <div style="background: rgba(255, 217, 61, 0.1); border: 1px solid rgba(255, 217, 61, 0.2); border-radius: 20px; padding: 2rem; display: flex; align-items: flex-start; gap: 1.5rem; transition: all 0.4s;">
                            <div style="width: 70px; height: 70px; background: linear-gradient(135deg, #FFD93D, #FFA372); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; box-shadow: 0 10px 25px rgba(255, 217, 61, 0.3);">
                                <i class="fas fa-chart-line" style="color: white; font-size: 2rem;"></i>
                            </div>
                            <div>
                                <h4 style="color: white; font-size: 1.3rem; margin-bottom: 0.8rem; font-weight: 700;">Tính Toán Chính Xác</h4>
                                <p style="color: rgba(255, 255, 255, 0.7); line-height: 1.6; font-size: 0.95rem;">Sử dụng công thức và tiêu chuẩn quốc tế được công nhận trong ngành cách nhiệt</p>
                            </div>
                        </div>

                        <div style="background: rgba(255, 107, 53, 0.1); border: 1px solid rgba(255, 107, 53, 0.2); border-radius: 20px; padding: 2rem; display: flex; align-items: flex-start; gap: 1.5rem; transition: all 0.4s;">
                            <div style="width: 70px; height: 70px; background: linear-gradient(135deg, #FF6B35, #FFA372); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; box-shadow: 0 10px 25px rgba(255, 107, 53, 0.3);">
                                <i class="fas fa-clock" style="color: white; font-size: 2rem;"></i>
                            </div>
                            <div>
                                <h4 style="color: white; font-size: 1.3rem; margin-bottom: 0.8rem; font-weight: 700;">Tiết Kiệm 70% Thời Gian</h4>
                                <p style="color: rgba(255, 255, 255, 0.7); line-height: 1.6; font-size: 0.95rem;">Giảm thời gian thiết kế so với tính thủ công, tăng hiệu suất làm việc đáng kể</p>
                            </div>
                        </div>

                        <div style="background: rgba(120, 168, 46, 0.1); border: 1px solid rgba(120, 168, 46, 0.2); border-radius: 20px; padding: 2rem; display: flex; align-items: flex-start; gap: 1.5rem; transition: all 0.4s;">
                            <div style="width: 70px; height: 70px; background: linear-gradient(135deg, #78A82E, #94C842); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; box-shadow: 0 10px 25px rgba(120, 168, 46, 0.3);">
                                <i class="fas fa-file-alt" style="color: white; font-size: 2rem;"></i>
                            </div>
                            <div>
                                <h4 style="color: white; font-size: 1.3rem; margin-bottom: 0.8rem; font-weight: 700;">Báo Cáo Chi Tiết</h4>
                                <p style="color: rgba(255, 255, 255, 0.7); line-height: 1.6; font-size: 0.95rem;">Tạo báo cáo chuyên nghiệp với biểu đồ, bảng tính và khuyến nghị cụ thể</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CTA Section -->
                <div class="calc-cta animate-on-scroll" style="background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(10px); border: 1px solid rgba(148, 200, 66, 0.3); border-radius: 30px; padding: 4rem; text-align: center;">
                    <div style="max-width: 600px; margin: 0 auto;">
                        <h3 style="color: white; font-size: 2.2rem; margin-bottom: 1.2rem; font-weight: 700;">
                            Cần Hỗ Trợ Tính Toán Cụ Thể?
                        </h3>
                        <p style="color: rgba(255, 255, 255, 0.8); font-size: 1.1rem; margin-bottom: 2.5rem; line-height: 1.7;">
                            Đội ngũ kỹ sư của 3igreen sẵn sàng hỗ trợ tư vấn và tính toán cách nhiệt cho dự án của bạn
                        </p>
                        <div style="display: flex; gap: 1.5rem; justify-content: center; flex-wrap: wrap;">
                            <a href="#contact" style="display: inline-flex; align-items: center; gap: 0.8rem; background: linear-gradient(135deg, #94C842, #FFD93D); color: white; padding: 1.2rem 2.5rem; border-radius: 50px; text-decoration: none; font-weight: 600; font-size: 1.05rem; transition: all 0.3s; box-shadow: 0 15px 35px rgba(148, 200, 66, 0.4);">
                                <i class="fas fa-phone"></i>
                                <span>Tư vấn miễn phí</span>
                            </a>
                            <a href="mailto:technical@3igreen.com.vn" style="display: inline-flex; align-items: center; gap: 0.8rem; background: transparent; color: white; padding: 1.2rem 2.5rem; border-radius: 50px; text-decoration: none; font-weight: 600; font-size: 1.05rem; border: 2px solid rgba(255, 255, 255, 0.3); transition: all 0.3s;">
                                <i class="fas fa-envelope"></i>
                                <span>Gửi yêu cầu kỹ thuật</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section class="contact" id="contact">
            <div class="container">
                <div class="contact-content">
                    <div class="contact-info animate-on-scroll slide-in-left">
                        <h2>Liên Hệ Với Chúng Tôi</h2>
                        <p class="contact-description">
                            Hãy để 3igreen tư vấn miễn phí và cung cấp giải pháp tối ưu nhất cho dự án của bạn. Chúng tôi cam kết phản hồi trong vòng 24 giờ với báo giá cạnh tranh nhất thị trường và công nghệ PU Foam tiên tiến.
                        </p>
                        
                        <div class="contact-details">
                            <div class="contact-item">
                                <i class="fas fa-building"></i>
                                <div>
                                    <h5>Công ty TNHH Sản Xuất và Ứng Dụng Vật Liệu Xanh 3I</h5>
                                    <p>Mã số thuế: 0110886479</p>
                                </div>
                            </div>
                            
                            <div class="contact-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <div>
                                    <h5>Địa chỉ trụ sở chính</h5>
                                    <p>I02-L12 Khu An Phú Shop villa, KĐT Dương Nội, phường Dương Nội, thành phố Hà Nội, Việt Nam</p>
                                </div>
                            </div>
                            
                            <div class="contact-item">
                                <i class="fas fa-phone-alt"></i>
                                <div>
                                    <h5>Hotline tư vấn 24/7</h5>
                                    <p>0973.098.338</p>
                                </div>
                            </div>
                            
                            <div class="contact-item">
                                <i class="fas fa-envelope"></i>
                                <div>
                                    <h5>Email</h5>
                                    <p>info@3igreen.com.vn</p>
                                </div>
                            </div>

                            <div class="contact-item">
                                <i class="fas fa-clock"></i>
                                <div>
                                    <h5>Giờ làm việc</h5>
                                    <p>Thứ 2 - Thứ 6: 8:00 - 17:30<br>
                                       Thứ 7: 8:00 - 12:00<br>
                                       Chủ nhật: Nghỉ</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="contact-form animate-on-scroll slide-in-right">
                        <h3>Nhận Báo Giá Miễn Phí Ngay!</h3>
                        <form id="contactForm">
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="fullName">Họ và tên *</label>
                                    <input type="text" id="fullName" name="fullName" placeholder="Nhập họ và tên đầy đủ" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="phone">Số điện thoại *</label>
                                    <input type="tel" id="phone" name="phone" placeholder="Số điện thoại liên hệ" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="email">Email *</label>
                                    <input type="email" id="email" name="email" placeholder="Email của bạn" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="company">Công ty/Tổ chức</label>
                                    <input type="text" id="company" name="company" placeholder="Tên công ty hoặc tổ chức">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="projectType">Loại dự án *</label>
                                <select id="projectType" name="projectType" required>
                                    <option value="">Chọn loại dự án</option>
                                    <option value="hvac">Hệ thống HVAC</option>
                                    <option value="chiller">Đường ống Chiller</option>
                                    <option value="cold-storage">Phòng lạnh/Kho đông</option>
                                    <option value="industrial">Công nghiệp đặc biệt</option>
                                    <option value="residential">Dân dụng</option>
                                    <option value="other">Khác</option>
                                </select>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="budget">Ngân sách dự kiến</label>
                                    <select id="budget" name="budget">
                                        <option value="">Chọn ngân sách</option>
                                        <option value="under-100m">Dưới 100 triệu</option>
                                        <option value="100m-500m">100 - 500 triệu</option>
                                        <option value="500m-1b">500 triệu - 1 tỷ</option>
                                        <option value="1b-5b">1 - 5 tỷ</option>
                                        <option value="over-5b">Trên 5 tỷ</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="timeline">Thời gian thực hiện</label>
                                    <select id="timeline" name="timeline">
                                        <option value="">Chọn thời gian</option>
                                        <option value="urgent">Khẩn cấp (1-2 tuần)</option>
                                        <option value="1month">Trong 1 tháng</option>
                                        <option value="3months">Trong 3 tháng</option>
                                        <option value="6months">Trong 6 tháng</option>
                                        <option value="flexible">Linh hoạt</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="message">Mô tả chi tiết dự án *</label>
                                <textarea id="message" name="message" rows="5" placeholder="Vui lòng mô tả chi tiết về dự án: diện tích, yêu cầu kỹ thuật, điều kiện đặc biệt, loại vật liệu PU Foam cần sử dụng..." required></textarea>
                            </div>
                            
                            <div class="form-submit">
                                <button type="submit" class="btn-submit">
                                    <i class="fas fa-paper-plane"></i>
                                    Gửi Yêu Cầu Báo Giá
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-brand">
                    <h3><i class="fas fa-leaf"></i> 3igreen</h3>
                    <p>Chuyên sản xuất và cung cấp các giải pháp vật liệu xanh chất lượng cao cho công nghiệp. Với hơn 10 năm kinh nghiệm và công nghệ PU Foam tiên tiến, chúng tôi tự hào là đối tác tin cậy của hàng trăm doanh nghiệp lớn.</p>
                    <div class="footer-social">
                        <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-youtube"></i></a>
                        <a href="#" class="social-link"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
                
                <div class="footer-section">
                    <h4>Sản phẩm</h4>
                    <ul class="footer-links">
                        <li><a href="#features">Gói đỡ PU Foam</a></li>
                        <li><a href="#applications">Ứng dụng PU Foam</a></li>
                        <li><a href="#specs">Thông số kỹ thuật</a></li>
                        <li><a href="#contact">Báo giá</a></li>
                        <li><a href="#about">Công nghệ KingsPipe</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h4>Dịch vụ</h4>
                    <ul class="footer-links">
                        <li><a href="#contact">Tư vấn miễn phí</a></li>
                        <li><a href="#support">Công cụ tính toán 3iCalc</a></li>
                        <li><a href="#contact">Thiết kế & Lắp đặt</a></li>
                        <li><a href="#contact">Bảo hành & Sửa chữa</a></li>
                        <li><a href="#contact">Hỗ trợ kỹ thuật</a></li>
                        <li><a href="#contact">Đào tạo sử dụng</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h4>Liên hệ nhanh</h4>
                    <ul class="footer-links">
                        <li><a href="tel:0973098338"><i class="fas fa-phone"></i> 0973.098.338</a></li>
                        <li><a href="mailto:info@3igreen.com.vn"><i class="fas fa-envelope"></i> info@3igreen.com.vn</a></li>
                        <li><a href="#contact"><i class="fas fa-map-marker-alt"></i> Hà Nội, Việt Nam</a></li>
                        <li><a href="#contact"><i class="fas fa-clock"></i> 8:00 - 17:30 (T2-T6)</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2025 - CÔNG TY TNHH SẢN XUẤT VÀ ỨNG DỤNG VẬT LIỆU XANH 3I. Mọi quyền được bảo lưu. | 
                   Thiết kế bởi 3igreen Team</p>
            </div>
        </div>
    </footer>

    <!-- Floating Action Buttons -->
    <div class="fab-container">
        <a href="tel:0973098338" class="fab phone" title="Gọi điện ngay">
            <i class="fas fa-phone"></i>
        </a>
        <a href="https://zalo.me/0973098338" class="fab zalo" title="Chat Zalo" target="_blank">
            <i class="fab fa-facebook-messenger"></i>
        </a>
        <button class="fab" onclick="scrollToTop()" title="Lên đầu trang">
            <i class="fas fa-arrow-up"></i>
        </button>
    </div>

    <script>
        // Loading Animation
        window.addEventListener('load', () => {
            setTimeout(() => {
                document.querySelector('.loading').classList.add('hidden');
                document.body.style.overflow = 'visible';
            }, 2000);
        });

        // Hero Background Slider
        function initHeroSlider() {
            const slides = document.querySelectorAll('.hero-slide');
            let currentSlide = 0;

            function nextSlide() {
                // Remove active class from current slide
                slides[currentSlide].classList.remove('active');

                // Move to next slide
                currentSlide = (currentSlide + 1) % slides.length;

                // Add active class to new slide
                slides[currentSlide].classList.add('active');
            }

            // Change slide every 5 seconds
            setInterval(nextSlide, 5000);
        }

        // Initialize slider when DOM is ready
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initHeroSlider);
        } else {
            initHeroSlider();
        }

        // Header Scroll Effect
        let ticking = false;
        function updateOnScroll() {
            const header = document.querySelector('header');
            const scrollProgress = document.querySelector('.scroll-progress');
            const fabContainer = document.querySelector('.fab-container');
            
            if (window.scrollY > 100) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }

            // Update scroll progress
            const windowHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrolled = (window.scrollY / windowHeight) * 100;
            scrollProgress.style.width = scrolled + '%';

            // Show/Hide FAB
            if (window.scrollY > 500) {
                fabContainer.style.opacity = '1';
                fabContainer.style.visibility = 'visible';
            } else {
                fabContainer.style.opacity = '0';
                fabContainer.style.visibility = 'hidden';
            }
            
            ticking = false;
        }

        window.addEventListener('scroll', () => {
            if (!ticking) {
                requestAnimationFrame(updateOnScroll);
                ticking = true;
            }
        });

        // Mobile Menu Toggle
        const mobileMenu = document.querySelector('.mobile-menu');
        const navMenu = document.querySelector('.nav-menu');

        if (mobileMenu && navMenu) {
            mobileMenu.addEventListener('click', () => {
                navMenu.classList.toggle('active');
                const icon = mobileMenu.querySelector('i');
                if (navMenu.classList.contains('active')) {
                    icon.classList.remove('fa-bars');
                    icon.classList.add('fa-times');
                } else {
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars');
                }
            });

            // Close mobile menu when clicking on a link
            document.querySelectorAll('.nav-menu a').forEach(link => {
                link.addEventListener('click', () => {
                    navMenu.classList.remove('active');
                    const icon = mobileMenu.querySelector('i');
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars');
                });
            });
        }

        // Smooth Scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    const headerHeight = document.querySelector('header').offsetHeight;
                    const targetPosition = target.offsetTop - headerHeight;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Animate on Scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animated');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.animate-on-scroll').forEach(el => {
            observer.observe(el);
        });

        // Scroll to Top
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        // Counter Animation for Stats
        function animateCounter(element, target, duration = 2000) {
            // Prevent re-animation
            if (element.dataset.animated === 'true') {
                return;
            }
            element.dataset.animated = 'true';

            let start = 0;
            const isPercentage = target.toString().includes('%');
            const isPlus = target.toString().includes('+');
            const targetNumber = parseInt(target.toString().replace(/[^\d]/g, ''));

            if (isNaN(targetNumber) || targetNumber === 0) {
                return;
            }

            const increment = targetNumber / (duration / 16);
            let animationFrameId;

            function updateCounter() {
                start += increment;
                if (start < targetNumber) {
                    let displayValue = Math.floor(start);
                    if (isPercentage) displayValue += '%';
                    if (isPlus) displayValue += '+';
                    element.textContent = displayValue;
                    animationFrameId = requestAnimationFrame(updateCounter);
                } else {
                    element.textContent = target;
                    if (animationFrameId) {
                        cancelAnimationFrame(animationFrameId);
                    }
                }
            }
            updateCounter();
        }

        // Stats Animation Observer
        const statsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !entry.target.dataset.observed) {
                    entry.target.dataset.observed = 'true';
                    const numbers = entry.target.querySelectorAll('.stat-number, .number');
                    numbers.forEach(number => {
                        if (!number.dataset.animated) {
                            const target = number.textContent.trim();
                            if (target) {
                                animateCounter(number, target);
                            }
                        }
                    });
                    statsObserver.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.3,
            rootMargin: '0px'
        });

        document.querySelectorAll('.stats-section, .company-stats').forEach(section => {
            statsObserver.observe(section);
        });

        // Enhanced Form Validation
        const inputs = document.querySelectorAll('input[required], textarea[required], select[required]');
        inputs.forEach(input => {
            input.addEventListener('blur', validateField);
            input.addEventListener('input', clearValidation);
        });

        function validateField(e) {
            const field = e.target;
            const value = field.value.trim();
            
            if (!value) {
                showFieldError(field, 'Trường này là bắt buộc');
                return false;
            }
            
            if (field.type === 'email' && !isValidEmail(value)) {
                showFieldError(field, 'Email không hợp lệ');
                return false;
            }
            
            if (field.type === 'tel' && !isValidPhone(value)) {
                showFieldError(field, 'Số điện thoại không hợp lệ');
                return false;
            }
            
            clearFieldError(field);
            return true;
        }

        function showFieldError(field, message) {
            clearFieldError(field);
            field.classList.add('error');
            const errorDiv = document.createElement('div');
            errorDiv.className = 'field-error';
            errorDiv.textContent = message;
            errorDiv.style.cssText = 'color: #ff6b6b; font-size: 0.85rem; margin-top: 0.5rem;';
            field.parentNode.appendChild(errorDiv);
        }

        function clearFieldError(field) {
            field.classList.remove('error');
            const errorDiv = field.parentNode.querySelector('.field-error');
            if (errorDiv) errorDiv.remove();
        }

        function clearValidation(e) {
            clearFieldError(e.target);
        }

        function isValidEmail(email) {
            return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        }

        function isValidPhone(phone) {
            return /^[\d\s\-\+\(\)]{10,}$/.test(phone.replace(/\s/g, ''));
        }

        // Enhanced Form Submission
        const contactForm = document.getElementById('contactForm');
        if (contactForm) {
            contactForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Validate all fields
                let isValid = true;
                const requiredFields = this.querySelectorAll('input[required], textarea[required], select[required]');
                
                requiredFields.forEach(field => {
                    if (!validateField({ target: field })) {
                        isValid = false;
                    }
                });
                
                if (!isValid) {
                    const firstError = this.querySelector('.error');
                    if (firstError) {
                        firstError.focus();
                        firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                    return;
                }
                
                // If validation passes, submit form
                const submitBtn = this.querySelector('.btn-submit');
                const originalText = submitBtn.innerHTML;
                
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Đang xử lý...';
                submitBtn.disabled = true;
                
                // Simulate API call
                setTimeout(() => {
                    // Success message
                    const successMessage = document.createElement('div');
                    successMessage.className = 'success-message';
                    successMessage.innerHTML = `
                        <div style="background: linear-gradient(135deg, #94C842, #78A82E); color: white; padding: 1.5rem; border-radius: 15px; text-align: center; margin-bottom: 2rem; box-shadow: 0 10px 30px rgba(16, 185, 129, 0.3);">
                            <i class="fas fa-check-circle" style="font-size: 2rem; margin-bottom: 1rem;"></i>
                            <h4 style="margin-bottom: 0.5rem;">Gửi yêu cầu thành công!</h4>
                            <p style="margin: 0; opacity: 0.9;">Cảm ơn bạn đã tin tưởng 3igreen. Chúng tôi sẽ liên hệ với bạn trong vòng 24 giờ với báo giá chi tiết nhất về công nghệ PU Foam.</p>
                        </div>
                    `;
                    
                    this.parentNode.insertBefore(successMessage, this);
                    this.reset();
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                    
                    // Remove success message after 10 seconds
                    setTimeout(() => {
                        successMessage.remove();
                    }, 10000);
                    
                    // Scroll to success message
                    successMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    
                }, 2500);
            });
        }

        // Add CSS for error states
        const style = document.createElement('style');
        style.textContent = `
            .form-group input.error,
            .form-group textarea.error,
            .form-group select.error {
                border-color: #ff6b6b !important;
                box-shadow: 0 0 0 3px rgba(255, 107, 107, 0.1) !important;
            }
        `;
        document.head.appendChild(style);

        // Interactive Card Effects
        document.querySelectorAll('.feature-card, .app-item').forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-15px) scale(1.02)';
            });
            
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0) scale(1)';
            });
        });

        // Add keyboard navigation support
        document.addEventListener('keydown', (e) => {
            // ESC key to close mobile menu
            if (e.key === 'Escape' && navMenu && navMenu.classList.contains('active')) {
                navMenu.classList.remove('active');
                const icon = mobileMenu.querySelector('i');
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });

        // Console welcome message
        console.log('%c🌱 3igreen - Vật Liệu Xanh Chất Lượng Cao 🌱', 'color: #2c5b3b; font-size: 20px; font-weight: bold;');
        console.log('%cWebsite được thiết kế và phát triển bởi đội ngũ 3igreen', 'color: #FFD93D; font-size: 14px;');
        console.log('%cLiên hệ: 0973.098.338 | info@3igreen.com.vn', 'color: #FF6B35; font-size: 12px;');

        // Initialize everything when DOM is loaded
        document.addEventListener('DOMContentLoaded', () => {
            // Add loading state to body
            document.body.style.overflow = 'hidden';
        });

        // Page visibility API for performance
        document.addEventListener('visibilitychange', () => {
            if (document.hidden) {
                // Pause animations when tab is not visible
                document.querySelectorAll('.floating-card').forEach(card => {
                    card.style.animationPlayState = 'paused';
                });
            } else {
                // Resume animations when tab becomes visible
                document.querySelectorAll('.floating-card').forEach(card => {
                    card.style.animationPlayState = 'running';
                });
            }
        });
    </script>
</body>
</html>
