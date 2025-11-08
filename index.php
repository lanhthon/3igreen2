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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Gói Đỡ PU Foam Cách Nhiệt, Chịu Lực Cao - 3igreen | Tiết Kiệm 70% Thời Gian Thi Công</title>
    <meta name="description" content="3igreen chuyên sản xuất gói đỡ PU Foam chất lượng cao với hệ số dẫn nhiệt thấp, khả năng chịu lực tốt. Giải pháp tối ưu cho hệ thống lạnh, chiller, điều hòa không khí. Tiết kiệm 70% thời gian thi công.">
    <meta name="keywords" content="gói đỡ pu foam, gói đỡ ống chiller, gói đỡ cách nhiệt, vật liệu xanh 3i, 3igreen, pu foam, pu foam đế vuông, pu foam đế tròn, kingspipe">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            /* Bảng màu Lime Green Theme - #94C842 chủ đạo */
            --primary-color: #94C842;        /* Lime Green - Xanh lá chanh chủ đạo */
            --primary-light: #B5E550;        /* Light Lime - Xanh chanh sáng */
            --primary-dark: #78A82E;         /* Dark Lime - Xanh chanh đậm */
            --secondary-color: #FFD93D;      /* Bright Yellow - Vàng tươi */
            --accent-color: #FF6B35;         /* Coral Orange - Cam san hô */
            --accent-light: #FFA372;         /* Light Coral - Cam nhạt */
            --text-dark: #2d3436;            /* Charcoal - Xám đen */
            --text-light: #636e72;           /* Gray - Xám */
            --text-muted: #b2bec3;           /* Light Gray - Xám nhạt */
            --bg-light: #fcfff5;             /* Cream White - Trắng kem xanh */
            --bg-section: #f7fce8;           /* Light Lime BG - Nền xanh chanh nhạt */
            --white: #ffffff;
            --glass-bg: rgba(255, 255, 255, 0.15);
            --shadow: 0 25px 50px rgba(148, 200, 66, 0.15);
            --shadow-lg: 0 35px 70px rgba(148, 200, 66, 0.20);
            --shadow-hover: 0 40px 80px rgba(148, 200, 66, 0.25);
            --border-radius: 20px;
            --border-radius-lg: 30px;
            --transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            line-height: 1.7;
            color: var(--text-dark);
            overflow-x: hidden;
            scroll-behavior: smooth;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--bg-light);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary-color);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--primary-dark);
        }

        /* Loading Animation */
        .loading {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.8s ease, visibility 0.8s ease;
        }

        .loading.hidden {
            opacity: 0;
            visibility: hidden;
        }

        .loader {
            width: 80px;
            height: 80px;
            border: 4px solid transparent;
            border-top: 4px solid var(--accent-color);
            border-radius: 50%;
            animation: spin 1.2s cubic-bezier(0.68, -0.55, 0.265, 1.55) infinite;
            margin-bottom: 2rem;
        }

        .loading-text {
            color: var(--white);
            font-size: 1.2rem;
            font-weight: 600;
            letter-spacing: 1px;
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes pulse {
            0%, 100% { opacity: 0.7; }
            50% { opacity: 1; }
        }

        /* Scroll Progress */
        .scroll-progress {
            position: fixed;
            top: 0;
            left: 0;
            width: 0%;
            height: 4px;
            background: linear-gradient(90deg, var(--accent-color), var(--accent-light));
            z-index: 10000;
            transition: width 0.3s ease;
            box-shadow: 0 2px 10px rgba(247, 127, 0, 0.3);
        }

        /* Header */
        header {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(30px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            padding: 1rem 0;
            z-index: 1000;
            transition: var(--transition);
        }

        header.scrolled {
            background: rgba(255, 255, 255, 0.95);
            box-shadow: var(--shadow);
            padding: 0.8rem 0;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .logo {
            font-family: 'Poppins', sans-serif;
            font-size: 2rem;
            font-weight: 800;
            color: var(--primary-color);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.8rem;
            transition: var(--transition);
        }

        .logo:hover {
            transform: scale(1.05);
        }

        .logo-img {
            width: 50px;
            height: 50px;
            object-fit: contain;
        }

        .logo-text {
            background: linear-gradient(135deg, var(--secondary-color), var(--accent-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .logo i {
            font-size: 2.5rem;
            background: linear-gradient(135deg, var(--secondary-color), var(--accent-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 2.5rem;
        }

        .nav-menu a {
            text-decoration: none;
            color: var(--text-dark);
            font-weight: 600;
            font-size: 1rem;
            transition: var(--transition);
            position: relative;
            padding: 0.5rem 0;
        }

        .nav-menu a:hover {
            color: var(--primary-color);
            transform: translateY(-2px);
        }

        .nav-menu a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 3px;
            bottom: -2px;
            left: 0;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
            transition: width 0.4s ease;
            border-radius: 2px;
        }

        .nav-menu a:hover::after {
            width: 100%;
        }

        .nav-cta {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            color: var(--white);
            padding: 0.8rem 1.8rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
            transition: var(--transition);
            box-shadow: var(--shadow);
        }

        .nav-cta:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-hover);
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-color));
        }

        .mobile-menu {
            display: none;
            cursor: pointer;
            font-size: 1.8rem;
            color: var(--primary-color);
            transition: var(--transition);
        }

        .mobile-menu:hover {
            transform: scale(1.1);
        }

        /* Hero Section */
        .hero {
            height: 100vh;
            display: flex;
            align-items: center;
            background: linear-gradient(135deg, 
                rgba(30, 81, 40, 0.95), 
                rgba(78, 124, 89, 0.9)),
                url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><radialGradient id="grad1" cx="50%" cy="50%" r="50%"><stop offset="0%" style="stop-color:rgba(82,183,136,0.1);stop-opacity:1" /><stop offset="100%" style="stop-color:rgba(30,81,40,0.1);stop-opacity:1" /></radialGradient><pattern id="grid" width="100" height="100" patternUnits="userSpaceOnUse"><path d="M 100 0 L 0 0 0 100" fill="none" stroke="rgba(255,255,255,0.08)" stroke-width="1"/></pattern></defs><rect width="100%" height="100%" fill="url(%23grad1)"/><rect width="100%" height="100%" fill="url(%23grid)"/></svg>');
            background-size: cover;
            background-position: center;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at 20% 80%, rgba(247, 127, 0, 0.15) 0%, transparent 50%),
                        radial-gradient(circle at 80% 20%, rgba(82, 183, 136, 0.15) 0%, transparent 50%),
                        radial-gradient(circle at 40% 40%, rgba(252, 191, 73, 0.1) 0%, transparent 50%);
        }

        .hero-content {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            gap: 5rem;
            align-items: center;
            position: relative;
            z-index: 2;
        }

        .hero-text h1 {
            font-family: 'Poppins', sans-serif;
            font-size: 4rem;
            font-weight: 800;
            color: var(--white);
            margin-bottom: 1.5rem;
            line-height: 1.1;
            opacity: 0;
            animation: slideInLeft 1.2s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards 0.5s;
        }

        .hero-text .highlight {
            background: linear-gradient(135deg, var(--accent-color), var(--accent-light));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-text .subtitle {
            font-size: 1.4rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 2.5rem;
            font-weight: 400;
            line-height: 1.6;
            opacity: 0;
            animation: slideInLeft 1.2s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards 0.7s;
        }

        .hero-features {
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
            margin-bottom: 2.5rem;
            opacity: 0;
            animation: slideInLeft 1.2s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards 0.8s;
        }

        .hero-feature {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            color: rgba(255, 255, 255, 0.9);
            font-size: 1rem;
            font-weight: 500;
        }

        .hero-feature i {
            color: var(--accent-color);
            font-size: 1.2rem;
        }

        .hero-buttons {
            display: flex;
            gap: 1.5rem;
            flex-wrap: wrap;
            opacity: 0;
            animation: slideInLeft 1.2s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards 1s;
        }

        .btn {
            padding: 1.2rem 2.5rem;
            border: none;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.8rem;
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s ease;
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--accent-color), var(--accent-light));
            color: var(--text-dark);
            box-shadow: var(--shadow);
        }

        .btn-primary:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-hover);
        }

        .btn-outline {
            background: transparent;
            color: var(--white);
            border: 2px solid rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
        }

        .btn-outline:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: var(--white);
            transform: translateY(-4px);
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

        /* Sections */
        section {
            padding: 8rem 0;
            position: relative;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .section-header {
            text-align: center;
            margin-bottom: 5rem;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        .section-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: var(--white);
            padding: 0.6rem 1.5rem;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            box-shadow: var(--shadow);
        }

        .section-title {
            font-family: 'Poppins', sans-serif;
            font-size: 3rem;
            font-weight: 800;
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }

        .section-subtitle {
            font-size: 1.3rem;
            color: var(--text-light);
            line-height: 1.6;
            max-width: 700px;
            margin: 0 auto;
        }

        /* Stats Section */
        .stats-section {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            color: var(--white);
            padding: 6rem 0;
            margin: 4rem 0;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 3rem;
            text-align: center;
        }

        .stat-card {
            padding: 2rem;
        }

        .stat-card .number {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            color: var(--accent-light);
            font-family: 'Poppins', sans-serif;
        }

        .stat-card .label {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        /* About Section */
        .about {
            background: var(--bg-section);
            position: relative;
            overflow: hidden;
        }

        .about::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at 70% 20%, rgba(30, 81, 40, 0.05) 0%, transparent 50%);
        }

        .about-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 6rem;
            align-items: center;
            position: relative;
            z-index: 2;
        }

        .about-text h3 {
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 2rem;
            line-height: 1.3;
        }

        .about-text p {
            font-size: 1.1rem;
            color: var(--text-light);
            margin-bottom: 1.5rem;
            line-height: 1.7;
        }

        .about-highlights {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
            margin-top: 2.5rem;
        }

        .highlight-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem;
            background: var(--white);
            border-radius: 15px;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .highlight-item:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-hover);
        }

        .highlight-item i {
            font-size: 1.8rem;
            color: var(--accent-color);
            min-width: 40px;
        }

        .highlight-item div h5 {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 0.3rem;
        }

        .highlight-item div p {
            font-size: 0.9rem;
            color: var(--text-muted);
            margin: 0;
        }

        .about-visual {
            position: relative;
        }

        .company-card {
            background: var(--white);
            border-radius: var(--border-radius-lg);
            padding: 3rem;
            box-shadow: var(--shadow-lg);
            border: 1px solid rgba(30, 81, 40, 0.1);
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
            border-radius: var(--border-radius-lg);
            padding: 3rem;
            box-shadow: var(--shadow);
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1),
                        box-shadow 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid rgba(30, 81, 40, 0.08);
            position: relative;
            overflow: hidden;
            will-change: transform;
            backface-visibility: hidden;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color), var(--accent-color));
        }

        .feature-card:hover {
            transform: translateY(-15px);
            box-shadow: var(--shadow-hover);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 2rem;
            color: var(--white);
            font-size: 2rem;
            box-shadow: var(--shadow);
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1),
                        background 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            will-change: transform;
            backface-visibility: hidden;
        }

        .feature-card:hover .feature-icon {
            transform: scale(1.1) rotate(5deg);
            background: linear-gradient(135deg, var(--accent-color), var(--accent-light));
        }

        .feature-card h3 {
            font-size: 1.6rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 1rem;
            font-family: 'Poppins', sans-serif;
        }

        .feature-card p {
            color: var(--text-light);
            line-height: 1.7;
            margin-bottom: 1.5rem;
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

        /* Technical Specifications */
        .specs {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
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
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><pattern id="specs-pattern" width="50" height="50" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100%" height="100%" fill="url(%23specs-pattern)"/></svg>');
        }

        .specs-content {
            position: relative;
            z-index: 2;
        }

        .specs-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 3rem;
            margin-top: 4rem;
        }

        .spec-card {
            background: var(--glass-bg);
            backdrop-filter: blur(30px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: var(--border-radius);
            padding: 2.5rem;
            transition: var(--transition);
        }

        .spec-card:hover {
            transform: translateY(-10px);
            background: rgba(255, 255, 255, 0.2);
        }

        .spec-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .spec-icon {
            width: 60px;
            height: 60px;
            background: var(--accent-color);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: var(--text-dark);
            font-weight: 700;
        }

        .spec-header h4 {
            font-size: 1.4rem;
            font-weight: 600;
            margin: 0;
        }

        .spec-list {
            list-style: none;
            padding: 0;
        }

        .spec-list li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.8rem 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 0.95rem;
        }

        .spec-list li:last-child {
            border-bottom: none;
        }

        .spec-value {
            font-weight: 600;
            color: var(--accent-light);
        }

        /* Applications Section */
        .applications {
            background: var(--bg-section);
            position: relative;
        }

        .applications::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 50%;
            background: linear-gradient(45deg, rgba(82, 183, 136, 0.05), rgba(30, 81, 40, 0.03));
            border-radius: 100px 100px 0 0;
        }

        .app-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2.5rem;
            margin-top: 4rem;
            position: relative;
            z-index: 2;
        }

        .app-item {
            background: var(--white);
            border-radius: var(--border-radius);
            padding: 2.5rem;
            text-align: center;
            box-shadow: var(--shadow);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(30, 81, 40, 0.08);
        }

        .app-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(82, 183, 136, 0.1), transparent);
            transition: left 0.6s ease;
        }

        .app-item:hover::before {
            left: 100%;
        }

        .app-item:hover {
            transform: translateY(-15px);
            box-shadow: var(--shadow-hover);
        }

        .app-icon {
            font-size: 3.5rem;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, var(--secondary-color), var(--accent-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            transition: var(--transition);
        }

        .app-item:hover .app-icon {
            transform: scale(1.2);
        }

        .app-item h3 {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 1rem;
            font-family: 'Poppins', sans-serif;
        }

        .app-item p {
            color: var(--text-light);
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .app-benefits {
            list-style: none;
            padding: 0;
            text-align: left;
        }

        .app-benefits li {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            margin-bottom: 0.8rem;
            font-size: 0.9rem;
            color: var(--text-light);
        }

        .app-benefits li i {
            color: var(--accent-color);
            font-size: 0.8rem;
        }

        /* Projects Section */
        .projects {
            background: var(--bg-light);
            position: relative;
            overflow: hidden;
        }

        .projects::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 20% 20%, rgba(30, 81, 40, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(247, 127, 0, 0.05) 0%, transparent 50%);
        }

        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(380px, 1fr));
            gap: 3rem;
            margin-top: 4rem;
            position: relative;
            z-index: 2;
        }

        .project-card {
            background: var(--white);
            border-radius: var(--border-radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
            border: 1px solid rgba(30, 81, 40, 0.08);
            position: relative;
        }

        .project-card:hover {
            transform: translateY(-15px);
            box-shadow: var(--shadow-hover);
        }

        .project-image {
            height: 200px;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
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
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="project-pattern" width="20" height="20" patternUnits="userSpaceOnUse"><rect width="20" height="20" fill="none"/><circle cx="10" cy="10" r="1" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100%" height="100%" fill="url(%23project-pattern)"/></svg>');
        }

        .project-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: var(--transition);
        }

        .project-card:hover .project-overlay {
            opacity: 1;
        }

        .project-stats {
            display: flex;
            gap: 2rem;
            color: var(--white);
        }

        .stat {
            text-align: center;
        }

        .stat-number {
            display: block;
            font-size: 2rem;
            font-weight: 800;
            font-family: 'Poppins', sans-serif;
            color: var(--accent-light);
        }

        .stat-label {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        .project-content {
            padding: 2.5rem;
        }

        .project-category {
            display: inline-block;
            background: linear-gradient(135deg, var(--secondary-color), var(--accent-color));
            color: var(--white);
            padding: 0.4rem 1rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .project-content h3 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 1rem;
            line-height: 1.3;
            font-family: 'Poppins', sans-serif;
        }

        .project-content p {
            color: var(--text-light);
            line-height: 1.6;
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
        }

        .project-features {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .feature-tag {
            background: var(--bg-section);
            color: var(--text-dark);
            padding: 0.3rem 0.8rem;
            border-radius: 15px;
            font-size: 0.75rem;
            font-weight: 500;
            border: 1px solid rgba(30, 81, 40, 0.1);
        }

        .project-details {
            display: flex;
            gap: 1.5rem;
            flex-wrap: wrap;
            padding-top: 1rem;
            border-top: 1px solid rgba(30, 81, 40, 0.1);
        }

        .detail-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--text-muted);
            font-size: 0.85rem;
            font-weight: 500;
        }

        .detail-item i {
            color: var(--accent-color);
            font-size: 0.9rem;
        }

        .projects-cta {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            color: var(--white);
            border-radius: var(--border-radius-lg);
            padding: 4rem 3rem;
            text-align: center;
            margin-top: 5rem;
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
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="cta-pattern" width="30" height="30" patternUnits="userSpaceOnUse"><polygon points="15,0 30,15 15,30 0,15" fill="none" stroke="rgba(255,255,255,0.05)" stroke-width="1"/></pattern></defs><rect width="100%" height="100%" fill="url(%23cta-pattern)"/></svg>');
        }

        .projects-cta h3 {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 1rem;
            position: relative;
            z-index: 2;
        }

        .projects-cta p {
            font-size: 1.1rem;
            opacity: 0.9;
            margin-bottom: 2rem;
            position: relative;
            z-index: 2;
        }

        .projects-cta .btn {
            position: relative;
            z-index: 2;
            background: linear-gradient(135deg, var(--accent-color), var(--accent-light));
            color: var(--text-dark);
        }
        .contact {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
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
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><pattern id="contact-pattern" width="100" height="100" patternUnits="userSpaceOnUse"><polygon points="50,0 100,50 50,100 0,50" fill="none" stroke="rgba(255,255,255,0.05)" stroke-width="1"/></pattern></defs><rect width="100%" height="100%" fill="url(%23contact-pattern)"/></svg>');
        }

        .contact-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 6rem;
            align-items: start;
            position: relative;
            z-index: 2;
        }

        .contact-info h2 {
            font-family: 'Poppins', sans-serif;
            font-size: 2.8rem;
            font-weight: 800;
            margin-bottom: 2rem;
            line-height: 1.2;
        }

        .contact-description {
            font-size: 1.2rem;
            margin-bottom: 3rem;
            opacity: 0.9;
            line-height: 1.6;
        }

        .contact-details {
            space-y: 2rem;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            margin-bottom: 2rem;
            padding: 1.5rem;
            background: var(--glass-bg);
            border-radius: 15px;
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: var(--transition);
        }

        .contact-item:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateX(10px);
        }

        .contact-item i {
            font-size: 1.8rem;
            color: var(--accent-light);
            min-width: 40px;
        }

        .contact-item div h5 {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .contact-item div p {
            opacity: 0.9;
            margin: 0;
            font-size: 1rem;
        }

        .contact-form {
            background: var(--glass-bg);
            backdrop-filter: blur(30px);
            border-radius: var(--border-radius-lg);
            padding: 3rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: var(--shadow-lg);
        }

        .contact-form h3 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 2rem;
            text-align: center;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.8rem;
            font-weight: 600;
            font-size: 0.95rem;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 1.2rem;
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.1);
            color: var(--white);
            font-size: 1rem;
            transition: var(--transition);
        }

        .form-group input::placeholder,
        .form-group textarea::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: var(--accent-color);
            background: rgba(255, 255, 255, 0.15);
            box-shadow: 0 0 0 3px rgba(247, 127, 0, 0.1);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }

        .form-submit {
            text-align: center;
            margin-top: 2rem;
        }

        .btn-submit {
            background: linear-gradient(135deg, var(--accent-color), var(--accent-light));
            color: var(--text-dark);
            padding: 1.2rem 3rem;
            border: none;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: var(--transition);
            box-shadow: var(--shadow);
            display: inline-flex;
            align-items: center;
            gap: 0.8rem;
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-hover);
        }

        /* Footer */
        footer {
            background: var(--text-dark);
            color: var(--white);
            padding: 4rem 0 2rem 0;
            position: relative;
        }

        .footer-content {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 4rem;
            margin-bottom: 3rem;
        }

        .footer-brand h3 {
            font-family: 'Poppins', sans-serif;
            font-size: 2rem;
            font-weight: 800;
            color: var(--accent-light);
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .footer-brand p {
            opacity: 0.8;
            line-height: 1.6;
            margin-bottom: 2rem;
        }

        .footer-social {
            display: flex;
            gap: 1rem;
        }

        .social-link {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            text-decoration: none;
            transition: var(--transition);
        }

        .social-link:hover {
            background: linear-gradient(135deg, var(--accent-color), var(--accent-light));
            transform: translateY(-3px);
        }

        .footer-section h4 {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: var(--accent-light);
        }

        .footer-links {
            list-style: none;
            padding: 0;
        }

        .footer-links li {
            margin-bottom: 0.8rem;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: var(--transition);
        }

        .footer-links a:hover {
            color: var(--accent-light);
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
            .nav-menu {
                position: fixed;
                top: 80px;
                left: -100%;
                width: 100%;
                height: calc(100vh - 80px);
                background: rgba(255, 255, 255, 0.98);
                backdrop-filter: blur(30px);
                flex-direction: column;
                justify-content: flex-start;
                align-items: center;
                padding-top: 3rem;
                transition: left 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
                box-shadow: var(--shadow-lg);
                gap: 2rem;
            }

            .nav-menu.active {
                left: 0;
            }

            .nav-menu a {
                font-size: 1.2rem;
                padding: 1rem;
                width: 100%;
                text-align: center;
            }

            .nav-cta {
                display: none;
            }

            .mobile-menu {
                display: block;
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

        /* Dark Mode Support */
        @media (prefers-color-scheme: dark) {
            :root {
                --text-dark: #f9fafb;
                --text-light: #d1d5db;
                --text-muted: #9ca3af;
                --white: #1f2937;
                --bg-light: #111827;
                --bg-section: #1f2937;
            }

            .nav-menu {
                background: rgba(31, 41, 55, 0.98);
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
                <i class="fas fa-leaf"></i>
                <span class="logo-text">3igreen</span>
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
                                <i class="fas fa-leaf"></i>
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

        <!-- Leadership & Team Section -->
        <section class="team" id="team" style="padding: 5rem 0; background: linear-gradient(135deg, #fcfff5 0%, #f7fce8 100%);">
            <div class="container">
                <div class="section-header animate-on-scroll">
                    <div class="section-badge">
                        <i class="fas fa-users"></i>
                        Đội ngũ lãnh đạo
                    </div>
                    <h2 class="section-title">Ban Lãnh Đạo 3iGreen</h2>
                    <p class="section-subtitle">Đội ngũ lãnh đạo giàu kinh nghiệm, tâm huyết với sứ mệnh phát triển vật liệu xanh bền vững</p>
                </div>

                <div class="team-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 2.5rem; margin-top: 3rem;">
                    <!-- CEO -->
                    <div class="team-member animate-on-scroll" style="background: white; border-radius: 25px; overflow: hidden; box-shadow: 0 20px 40px rgba(148, 200, 66, 0.15); transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);">
                        <div class="member-photo" style="width: 100%; height: 320px; background: linear-gradient(135deg, #94C842, #B5E550); display: flex; align-items: center; justify-content: center; position: relative; overflow: hidden;">
                            <div style="width: 180px; height: 180px; background: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 10px 30px rgba(0,0,0,0.2);">
                                <i class="fas fa-user-tie" style="font-size: 80px; color: #94C842;"></i>
                            </div>
                            <div style="position: absolute; top: 20px; right: 20px; background: rgba(255,255,255,0.9); padding: 0.5rem 1rem; border-radius: 50px; font-size: 0.85rem; font-weight: 600; color: #78A82E;">
                                <i class="fas fa-crown"></i> CEO
                            </div>
                        </div>
                        <div style="padding: 2rem;">
                            <h3 style="font-size: 1.5rem; font-weight: 700; color: #2d3436; margin-bottom: 0.5rem;">Nguyễn Văn A</h3>
                            <p style="color: #94C842; font-weight: 600; margin-bottom: 1rem; font-size: 1rem;">Giám Đốc Điều Hành</p>
                            <p style="color: #636e72; line-height: 1.7; margin-bottom: 1.5rem;">Hơn 15 năm kinh nghiệm trong lĩnh vực vật liệu xanh và công nghệ cách nhiệt tiên tiến.</p>
                            <div class="social-links" style="display: flex; gap: 0.8rem;">
                                <a href="#" style="width: 40px; height: 40px; background: #f7fce8; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #94C842; text-decoration: none; transition: all 0.3s;">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="#" style="width: 40px; height: 40px; background: #f7fce8; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #94C842; text-decoration: none; transition: all 0.3s;">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- CTO -->
                    <div class="team-member animate-on-scroll" style="background: white; border-radius: 25px; overflow: hidden; box-shadow: 0 20px 40px rgba(148, 200, 66, 0.15); transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);">
                        <div class="member-photo" style="width: 100%; height: 320px; background: linear-gradient(135deg, #FFD93D, #FFA372); display: flex; align-items: center; justify-content: center; position: relative; overflow: hidden;">
                            <div style="width: 180px; height: 180px; background: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 10px 30px rgba(0,0,0,0.2);">
                                <i class="fas fa-user-cog" style="font-size: 80px; color: #FF6B35;"></i>
                            </div>
                            <div style="position: absolute; top: 20px; right: 20px; background: rgba(255,255,255,0.9); padding: 0.5rem 1rem; border-radius: 50px; font-size: 0.85rem; font-weight: 600; color: #FF6B35;">
                                <i class="fas fa-cog"></i> CTO
                            </div>
                        </div>
                        <div style="padding: 2rem;">
                            <h3 style="font-size: 1.5rem; font-weight: 700; color: #2d3436; margin-bottom: 0.5rem;">Trần Thị B</h3>
                            <p style="color: #FF6B35; font-weight: 600; margin-bottom: 1rem; font-size: 1rem;">Giám Đốc Công Nghệ</p>
                            <p style="color: #636e72; line-height: 1.7; margin-bottom: 1.5rem;">Chuyên gia công nghệ PU Foam với 12 năm kinh nghiệm nghiên cứu và phát triển sản phẩm.</p>
                            <div class="social-links" style="display: flex; gap: 0.8rem;">
                                <a href="#" style="width: 40px; height: 40px; background: #fff5f0; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #FF6B35; text-decoration: none; transition: all 0.3s;">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="#" style="width: 40px; height: 40px; background: #fff5f0; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #FF6B35; text-decoration: none; transition: all 0.3s;">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Sales Director -->
                    <div class="team-member animate-on-scroll" style="background: white; border-radius: 25px; overflow: hidden; box-shadow: 0 20px 40px rgba(148, 200, 66, 0.15); transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);">
                        <div class="member-photo" style="width: 100%; height: 320px; background: linear-gradient(135deg, #78A82E, #94C842); display: flex; align-items: center; justify-content: center; position: relative; overflow: hidden;">
                            <div style="width: 180px; height: 180px; background: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 10px 30px rgba(0,0,0,0.2);">
                                <i class="fas fa-user-chart" style="font-size: 80px; color: #78A82E;"></i>
                            </div>
                            <div style="position: absolute; top: 20px; right: 20px; background: rgba(255,255,255,0.9); padding: 0.5rem 1rem; border-radius: 50px; font-size: 0.85rem; font-weight: 600; color: #78A82E;">
                                <i class="fas fa-chart-line"></i> Director
                            </div>
                        </div>
                        <div style="padding: 2rem;">
                            <h3 style="font-size: 1.5rem; font-weight: 700; color: #2d3436; margin-bottom: 0.5rem;">Lê Văn C</h3>
                            <p style="color: #78A82E; font-weight: 600; margin-bottom: 1rem; font-size: 1rem;">Giám Đốc Kinh Doanh</p>
                            <p style="color: #636e72; line-height: 1.7; margin-bottom: 1.5rem;">10 năm kinh nghiệm phát triển thị trường và xây dựng mối quan hệ đối tác chiến lược.</p>
                            <div class="social-links" style="display: flex; gap: 0.8rem;">
                                <a href="#" style="width: 40px; height: 40px; background: #f7fce8; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #78A82E; text-decoration: none; transition: all 0.3s;">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="#" style="width: 40px; height: 40px; background: #f7fce8; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #78A82E; text-decoration: none; transition: all 0.3s;">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Production Manager -->
                    <div class="team-member animate-on-scroll" style="background: white; border-radius: 25px; overflow: hidden; box-shadow: 0 20px 40px rgba(148, 200, 66, 0.15); transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);">
                        <div class="member-photo" style="width: 100%; height: 320px; background: linear-gradient(135deg, #FF6B35, #FFD93D); display: flex; align-items: center; justify-content: center; position: relative; overflow: hidden;">
                            <div style="width: 180px; height: 180px; background: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 10px 30px rgba(0,0,0,0.2);">
                                <i class="fas fa-user-hard-hat" style="font-size: 80px; color: #FF6B35;"></i>
                            </div>
                            <div style="position: absolute; top: 20px; right: 20px; background: rgba(255,255,255,0.9); padding: 0.5rem 1rem; border-radius: 50px; font-size: 0.85rem; font-weight: 600; color: #FF6B35;">
                                <i class="fas fa-industry"></i> Manager
                            </div>
                        </div>
                        <div style="padding: 2rem;">
                            <h3 style="font-size: 1.5rem; font-weight: 700; color: #2d3436; margin-bottom: 0.5rem;">Phạm Thị D</h3>
                            <p style="color: #FF6B35; font-weight: 600; margin-bottom: 1rem; font-size: 1rem;">Quản Lý Sản Xuất</p>
                            <p style="color: #636e72; line-height: 1.7; margin-bottom: 1.5rem;">Chuyên gia sản xuất với 14 năm kinh nghiệm đảm bảo chất lượng và tối ưu quy trình.</p>
                            <div class="social-links" style="display: flex; gap: 0.8rem;">
                                <a href="#" style="width: 40px; height: 40px; background: #fff5f0; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #FF6B35; text-decoration: none; transition: all 0.3s;">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="#" style="width: 40px; height: 40px; background: #fff5f0; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #FF6B35; text-decoration: none; transition: all 0.3s;">
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
                        <div style="color: #636e72; font-weight: 600;">Nhân viên chuyên nghiệp</div>
                    </div>
                    <div style="text-align: center; padding: 2rem; background: white; border-radius: 20px; box-shadow: 0 10px 30px rgba(148, 200, 66, 0.1);">
                        <div style="font-size: 3rem; font-weight: 800; color: #FFD93D; margin-bottom: 0.5rem;">15+</div>
                        <div style="color: #636e72; font-weight: 600;">Năm kinh nghiệm</div>
                    </div>
                    <div style="text-align: center; padding: 2rem; background: white; border-radius: 20px; box-shadow: 0 10px 30px rgba(148, 200, 66, 0.1);">
                        <div style="font-size: 3rem; font-weight: 800; color: #FF6B35; margin-bottom: 0.5rem;">100%</div>
                        <div style="color: #636e72; font-weight: 600;">Tâm huyết & chuyên nghiệp</div>
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
        <section class="products" id="products" style="background: linear-gradient(135deg, #f8fffe 0%, #e8f7f5 100%); padding: 5rem 0;">
            <div class="container">
                <div class="section-header animate-on-scroll">
                    <div class="section-badge">
                        <i class="fas fa-box-open"></i>
                        Sản phẩm
                    </div>
                    <h2 class="section-title">Dòng Sản Phẩm Gối Đỡ PU Foam</h2>
                    <p class="section-subtitle">Đa dạng các loại gối đỡ phù hợp với mọi nhu cầu công trình, từ dân dụng đến công nghiệp quy mô lớn</p>
                </div>

                <div class="products-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2.5rem; margin-top: 3rem;">
                    <!-- Product 1: Gối đỡ vuông 2 mảnh -->
                    <div class="product-card animate-on-scroll" style="background: white; border-radius: 30px; padding: 2.5rem; box-shadow: 0 25px 50px rgba(0,0,0,0.08); transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); position: relative; overflow: hidden;">
                        <div class="product-badge" style="position: absolute; top: 20px; right: 20px; background: linear-gradient(135deg, #94C842, #B5E550); color: white; padding: 0.5rem 1rem; border-radius: 50px; font-size: 0.85rem; font-weight: 600;">
                            <i class="fas fa-star"></i> Phổ biến
                        </div>

                        <div class="product-icon" style="width: 120px; height: 120px; margin: 0 auto 1.5rem; background: linear-gradient(135deg, #FFD93D, #94C842); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 3.5rem; color: white; box-shadow: 0 15px 35px rgba(82, 183, 136, 0.4);">
                            <i class="fas fa-cube"></i>
                        </div>

                        <h3 style="font-size: 1.5rem; font-weight: 700; color: #94C842; margin-bottom: 1rem; text-align: center;">Gối Đỡ Vuông 2 Mảnh</h3>

                        <p style="color: #6b7280; text-align: center; margin-bottom: 1.5rem; line-height: 1.7;">Thiết kế module 2 mảnh thông minh, lắp đặt siêu nhanh chóng. Phù hợp cho các dự án quy mô lớn cần tiết kiệm thời gian thi công.</p>

                        <div class="product-specs" style="background: #ecfdf5; padding: 1.5rem; border-radius: 20px; margin-bottom: 1.5rem;">
                            <h4 style="font-size: 1rem; color: #94C842; margin-bottom: 1rem; font-weight: 600;">
                                <i class="fas fa-info-circle"></i> Thông số kỹ thuật
                            </h4>
                            <ul style="list-style: none; padding: 0;">
                                <li style="display: flex; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px dashed #d1fae5;">
                                    <span style="color: #6b7280;">Đường kính ống:</span>
                                    <strong style="color: #94C842;">Ø21 - Ø219mm</strong>
                                </li>
                                <li style="display: flex; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px dashed #d1fae5;">
                                    <span style="color: #6b7280;">Độ dày:</span>
                                    <strong style="color: #94C842;">25 - 100mm</strong>
                                </li>
                                <li style="display: flex; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px dashed #d1fae5;">
                                    <span style="color: #6b7280;">Mật độ PU:</span>
                                    <strong style="color: #94C842;">40 kg/m³</strong>
                                </li>
                                <li style="display: flex; justify-content: space-between; padding: 0.5rem 0;">
                                    <span style="color: #6b7280;">Hệ số dẫn nhiệt:</span>
                                    <strong style="color: #94C842;">λ ≤ 0.022 W/m.K</strong>
                                </li>
                            </ul>
                        </div>

                        <div class="product-features" style="margin-bottom: 1.5rem;">
                            <div style="display: flex; align-items: center; gap: 0.8rem; margin-bottom: 0.8rem;">
                                <i class="fas fa-check-circle" style="color: #FFD93D; font-size: 1.2rem;"></i>
                                <span style="color: #4b5563;">Lắp đặt nhanh, tiết kiệm 70% thời gian</span>
                            </div>
                            <div style="display: flex; align-items: center; gap: 0.8rem; margin-bottom: 0.8rem;">
                                <i class="fas fa-check-circle" style="color: #FFD93D; font-size: 1.2rem;"></i>
                                <span style="color: #4b5563;">Chống thấm tuyệt đối < 1%</span>
                            </div>
                            <div style="display: flex; align-items: center; gap: 0.8rem;">
                                <i class="fas fa-check-circle" style="color: #FFD93D; font-size: 1.2rem;"></i>
                                <span style="color: #4b5563;">Chịu lực cao, không biến dạng</span>
                            </div>
                        </div>

                        <a href="#contact" class="product-btn" style="display: block; width: 100%; background: linear-gradient(135deg, #94C842, #FFD93D); color: white; text-align: center; padding: 1rem; border-radius: 15px; text-decoration: none; font-weight: 600; transition: all 0.3s; box-shadow: 0 10px 25px rgba(30, 81, 40, 0.3);">
                            <i class="fas fa-envelope"></i> Nhận Báo Giá Ngay
                        </a>
                    </div>

                    <!-- Product 2: Gối đỡ tròn có cùm -->
                    <div class="product-card animate-on-scroll" style="background: white; border-radius: 30px; padding: 2.5rem; box-shadow: 0 25px 50px rgba(0,0,0,0.08); transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); position: relative; overflow: hidden; border: 3px solid #FFD93D;">
                        <div class="product-badge" style="position: absolute; top: 20px; right: 20px; background: linear-gradient(135deg, #FF6B35, #FFA372); color: white; padding: 0.5rem 1rem; border-radius: 50px; font-size: 0.85rem; font-weight: 600;">
                            <i class="fas fa-crown"></i> Premium
                        </div>

                        <div class="product-icon" style="width: 120px; height: 120px; margin: 0 auto 1.5rem; background: linear-gradient(135deg, #FF6B35, #FFA372); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 3.5rem; color: white; box-shadow: 0 15px 35px rgba(247, 127, 0, 0.4);">
                            <i class="fas fa-circle"></i>
                        </div>

                        <h3 style="font-size: 1.5rem; font-weight: 700; color: #94C842; margin-bottom: 1rem; text-align: center;">Gối Đỡ Tròn Cùm Kim Loại</h3>

                        <p style="color: #6b7280; text-align: center; margin-bottom: 1.5rem; line-height: 1.7;">Tích hợp cùm kim loại inox 304, siết chặt tối ưu. Phù hợp ống chịu áp lực cao, hệ thống chiller công nghiệp.</p>

                        <div class="product-specs" style="background: #d1fae5; padding: 1.5rem; border-radius: 20px; margin-bottom: 1.5rem;">
                            <h4 style="font-size: 1rem; color: #FF6B35; margin-bottom: 1rem; font-weight: 600;">
                                <i class="fas fa-info-circle"></i> Thông số kỹ thuật
                            </h4>
                            <ul style="list-style: none; padding: 0;">
                                <li style="display: flex; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px dashed #a7f3d0;">
                                    <span style="color: #6b7280;">Đường kính ống:</span>
                                    <strong style="color: #FF6B35;">Ø27 - Ø273mm</strong>
                                </li>
                                <li style="display: flex; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px dashed #a7f3d0;">
                                    <span style="color: #6b7280;">Độ dày:</span>
                                    <strong style="color: #FF6B35;">30 - 100mm</strong>
                                </li>
                                <li style="display: flex; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px dashed #a7f3d0;">
                                    <span style="color: #6b7280;">Mật độ PU:</span>
                                    <strong style="color: #FF6B35;">40 kg/m³</strong>
                                </li>
                                <li style="display: flex; justify-content: space-between; padding: 0.5rem 0;">
                                    <span style="color: #6b7280;">Cùm kim loại:</span>
                                    <strong style="color: #FF6B35;">Inox 304</strong>
                                </li>
                            </ul>
                        </div>

                        <div class="product-features" style="margin-bottom: 1.5rem;">
                            <div style="display: flex; align-items: center; gap: 0.8rem; margin-bottom: 0.8rem;">
                                <i class="fas fa-check-circle" style="color: #FF6B35; font-size: 1.2rem;"></i>
                                <span style="color: #4b5563;">Ôm sát ống, cách nhiệt tối ưu</span>
                            </div>
                            <div style="display: flex; align-items: center; gap: 0.8rem; margin-bottom: 0.8rem;">
                                <i class="fas fa-check-circle" style="color: #FF6B35; font-size: 1.2rem;"></i>
                                <span style="color: #4b5563;">Cùm inox 304 bền bỉ chống gỉ</span>
                            </div>
                            <div style="display: flex; align-items: center; gap: 0.8rem;">
                                <i class="fas fa-check-circle" style="color: #FF6B35; font-size: 1.2rem;"></i>
                                <span style="color: #4b5563;">Chịu áp lực cao, rung động mạnh</span>
                            </div>
                        </div>

                        <a href="#contact" class="product-btn" style="display: block; width: 100%; background: linear-gradient(135deg, #FF6B35, #FFA372); color: white; text-align: center; padding: 1rem; border-radius: 15px; text-decoration: none; font-weight: 600; transition: all 0.3s; box-shadow: 0 10px 25px rgba(247, 127, 0, 0.3);">
                            <i class="fas fa-envelope"></i> Nhận Báo Giá Ngay
                        </a>
                    </div>

                </div>

                <!-- Product comparison table -->
                <div class="product-comparison" style="margin-top: 4rem; background: white; border-radius: 30px; padding: 2.5rem; box-shadow: 0 25px 50px rgba(0,0,0,0.08);">
                    <h3 style="font-size: 1.8rem; font-weight: 700; color: #94C842; margin-bottom: 2rem; text-align: center;">
                        <i class="fas fa-balance-scale"></i> So Sánh Các Dòng Sản Phẩm
                    </h3>

                    <div style="overflow-x: auto;">
                        <table style="width: 100%; border-collapse: collapse; font-size: 0.95rem;">
                            <thead>
                                <tr style="background: linear-gradient(135deg, #94C842, #FFD93D); color: white;">
                                    <th style="padding: 1.2rem; text-align: left; border-radius: 10px 0 0 0; font-size: 1.05rem;">Tiêu chí</th>
                                    <th style="padding: 1.2rem; text-align: center; font-size: 1.05rem;">
                                        <i class="fas fa-cube"></i> Gối đỡ đế vuông
                                    </th>
                                    <th style="padding: 1.2rem; text-align: center; border-radius: 0 10px 0 0; font-size: 1.05rem;">
                                        <i class="fas fa-circle"></i> Gối đỡ đế tròn
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="border-bottom: 1px solid #e5e7eb;">
                                    <td style="padding: 1.2rem; font-weight: 600; color: #94C842;"><i class="fas fa-ruler"></i> Độ dày</td>
                                    <td style="padding: 1.2rem; text-align: center; font-size: 1rem;">25 - 100mm</td>
                                    <td style="padding: 1.2rem; text-align: center; font-size: 1rem;">30 - 100mm</td>
                                </tr>
                                <tr style="border-bottom: 1px solid #e5e7eb; background: #fcfff5;">
                                    <td style="padding: 1.2rem; font-weight: 600; color: #94C842;"><i class="fas fa-clock"></i> Thời gian lắp đặt</td>
                                    <td style="padding: 1.2rem; text-align: center;"><i class="fas fa-bolt" style="color: #FFD93D;"></i> <strong style="color: #94C842;">Rất nhanh - 70% thời gian</strong></td>
                                    <td style="padding: 1.2rem; text-align: center;"><i class="fas fa-check" style="color: #FF6B35;"></i> Nhanh</td>
                                </tr>
                                <tr style="border-bottom: 1px solid #e5e7eb;">
                                    <td style="padding: 1.2rem; font-weight: 600; color: #94C842;"><i class="fas fa-cogs"></i> Ứng dụng</td>
                                    <td style="padding: 1.2rem; text-align: center;">Mọi loại ống, Chiller, HVAC</td>
                                    <td style="padding: 1.2rem; text-align: center;">Ống áp lực cao, Chiller công nghiệp</td>
                                </tr>
                                <tr style="border-bottom: 1px solid #e5e7eb; background: #fcfff5;">
                                    <td style="padding: 1.2rem; font-weight: 600; color: #94C842;"><i class="fas fa-fire"></i> Hệ số dẫn nhiệt</td>
                                    <td style="padding: 1.2rem; text-align: center;"><strong style="color: #94C842;">λ ≤ 0.022 W/m.K</strong></td>
                                    <td style="padding: 1.2rem; text-align: center;"><strong style="color: #FF6B35;">λ ≤ 0.022 W/m.K</strong></td>
                                </tr>
                                <tr style="background: #fcfff5;">
                                    <td style="padding: 1.2rem; font-weight: 600; color: #94C842;"><i class="fas fa-dollar-sign"></i> Giá thành</td>
                                    <td style="padding: 1.2rem; text-align: center;"><i class="fas fa-dollar-sign" style="color: #FFD93D;"></i> <strong style="color: #94C842;">Tốt nhất</strong></td>
                                    <td style="padding: 1.2rem; text-align: center;"><i class="fas fa-dollar-sign" style="color: #FF6B35;"></i><i class="fas fa-dollar-sign" style="color: #FF6B35;"></i> <strong style="color: #FF6B35;">Premium</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- CTA Section -->
                <div style="margin-top: 3rem; text-align: center; background: linear-gradient(135deg, #f0fdfa, #e8f7f5); padding: 3rem; border-radius: 30px;">
                    <h3 style="font-size: 2rem; font-weight: 700; color: #94C842; margin-bottom: 1rem;">
                        Chưa Chắc Chắn Sản Phẩm Nào Phù Hợp?
                    </h3>
                    <p style="color: #6b7280; font-size: 1.1rem; margin-bottom: 2rem;">
                        Đội ngũ kỹ sư của chúng tôi sẵn sàng tư vấn miễn phí để giúp bạn lựa chọn giải pháp tối ưu nhất
                    </p>
                    <div style="display: flex; gap: 1.5rem; justify-content: center; flex-wrap: wrap;">
                        <a href="tel:0973098338" style="display: inline-flex; align-items: center; gap: 0.8rem; background: linear-gradient(135deg, #94C842, #FFD93D); color: white; padding: 1.2rem 2.5rem; border-radius: 50px; text-decoration: none; font-weight: 600; font-size: 1.1rem; box-shadow: 0 15px 35px rgba(30, 81, 40, 0.3); transition: all 0.3s;">
                            <i class="fas fa-phone-alt"></i>
                            0973.098.338
                        </a>
                        <a href="#contact" style="display: inline-flex; align-items: center; gap: 0.8rem; background: white; color: #94C842; padding: 1.2rem 2.5rem; border-radius: 50px; text-decoration: none; font-weight: 600; font-size: 1.1rem; box-shadow: 0 15px 35px rgba(0,0,0,0.1); border: 2px solid #94C842; transition: all 0.3s;">
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
                        <div class="news-image" style="width: 100%; height: 250px; background: linear-gradient(135deg, #94C842, #B5E550); position: relative; overflow: hidden;">
                            <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: url('data:image/svg+xml,%3Csvg width=\"100\" height=\"100\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cpath d=\"M0 0h100v100H0z\" fill=\"%2394C842\" fill-opacity=\".1\"/%3E%3Ccircle cx=\"50\" cy=\"50\" r=\"40\" fill=\"%23fff\" fill-opacity=\".2\"/%3E%3C/svg%3E') center/cover; opacity: 0.3;"></div>
                            <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; color: white;">
                                <i class="fas fa-leaf" style="font-size: 80px; opacity: 0.8;"></i>
                            </div>
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
                            <p style="color: #636e72; line-height: 1.7; margin-bottom: 1.5rem;">
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
                        <div class="news-image" style="width: 100%; height: 250px; background: linear-gradient(135deg, #FFD93D, #FFA372); position: relative; overflow: hidden;">
                            <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: url('data:image/svg+xml,%3Csvg width=\"100\" height=\"100\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cpath d=\"M0 0h100v100H0z\" fill=\"%23FFD93D\" fill-opacity=\".1\"/%3E%3Crect x=\"20\" y=\"20\" width=\"60\" height=\"60\" fill=\"%23fff\" fill-opacity=\".2\" rx=\"10\"/%3E%3C/svg%3E') center/cover; opacity: 0.3;"></div>
                            <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; color: white;">
                                <i class="fas fa-award" style="font-size: 80px; opacity: 0.8;"></i>
                            </div>
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
                            <p style="color: #636e72; line-height: 1.7; margin-bottom: 1.5rem;">
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
                        <div class="news-image" style="width: 100%; height: 250px; background: linear-gradient(135deg, #FF6B35, #FFD93D); position: relative; overflow: hidden;">
                            <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: url('data:image/svg+xml,%3Csvg width=\"100\" height=\"100\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cpath d=\"M0 0h100v100H0z\" fill=\"%23FF6B35\" fill-opacity=\".1\"/%3E%3Cpolygon points=\"50,20 80,80 20,80\" fill=\"%23fff\" fill-opacity=\".2\"/%3E%3C/svg%3E') center/cover; opacity: 0.3;"></div>
                            <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; color: white;">
                                <i class="fas fa-lightbulb" style="font-size: 80px; opacity: 0.8;"></i>
                            </div>
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
                            <p style="color: #636e72; line-height: 1.7; margin-bottom: 1.5rem;">
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
        <section class="support-tools" id="support">
            <div class="container">
                <div class="section-header animate-on-scroll">
                    <div class="section-badge">
                        <i class="fas fa-calculator"></i>
                        Công cụ hỗ trợ
                    </div>
                    <h2 class="section-title">3iCalc - Công Cụ Tính Toán Cách Nhiệt Chuyên Nghiệp</h2>
                    <p class="section-subtitle">Phần mềm tính toán cách nhiệt chuyên nghiệp được phát triển bởi 3igreen để hỗ trợ tư vấn thiết kế, kỹ sư giám sát và nhà thầu tính toán chính xác độ dày cách nhiệt kinh tế.</p>
                </div>
                
                <div class="calc-intro animate-on-scroll">
                    <div class="calc-content">
                        <h3>Tại Sao Cần Tính Toán Độ Dày Cách Nhiệt Chính Xác?</h3>
                        <p>Việc lựa chọn chính xác độ dày cách nhiệt là công việc vô cùng quan trọng trong công tác thiết kế cách nhiệt cơ khí. Việc lựa chọn đúng độ dày bảo ôn sẽ <strong>ngăn chặn hiệu quả nhất sự đọng sương trên bề mặt của đường ống lạnh, giảm thiểu sự thất thoát năng lượng, giúp tối đa hóa chi phí vận hành hệ thống</strong> cho chủ đầu tư.</p>
                        
                        <div class="factors-grid">
                            <div class="factor-card">
                                <h4>Nhiệt độ môi trường</h4>
                                <div class="impact-level moderate">Ảnh hưởng vừa</div>
                                <p>Chênh lệch nhiệt độ bên trong và bên ngoài đường ống</p>
                            </div>
                            <div class="factor-card">
                                <h4>Độ ẩm môi trường</h4>
                                <div class="impact-level high">Ảnh hưởng rất lớn</div>
                                <p>Độ ẩm của môi trường xung quanh hệ thống</p>
                            </div>
                            <div class="factor-card">
                                <h4>Hệ số dẫn nhiệt</h4>
                                <div class="impact-level significant">Ảnh hưởng lớn</div>
                                <p>Của vật liệu bảo ôn (kể cả độ suy giảm theo thời gian)</p>
                            </div>
                            <div class="factor-card">
                                <h4>Vật liệu Jacketing</h4>
                                <div class="impact-level significant">Ảnh hưởng lớn</div>
                                <p>Loại vật liệu bảo vệ bên ngoài (Cladding)</p>
                            </div>
                            <div class="factor-card">
                                <h4>Tốc độ gió</h4>
                                <div class="impact-level moderate-high">Ảnh hưởng nhiều</div>
                                <p>Tốc độ gió của môi trường xung quanh</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="calc-tools-grid">
                    <div class="calc-tool animate-on-scroll">
                        <div class="tool-icon">
                            <i class="fas fa-wind"></i>
                        </div>
                        <h3>Tính Độ Dày Cách Nhiệt Ống Gió</h3>
                        <p>Tính toán độ dày cách nhiệt tối ưu cho hệ thống ống gió HVAC, đảm bảo hiệu quả năng lượng và ngăn ngừa đọng sương.</p>
                        <div class="tool-features">
                            <div class="feature-item">
                                <i class="fas fa-check"></i>
                                <span>Tính toán theo tiêu chuẩn ASHRAE</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-check"></i>
                                <span>Phân tích kinh tế chi phí</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-check"></i>
                                <span>Báo cáo kỹ thuật chi tiết</span>
                            </div>
                        </div>
                        <button class="calc-btn" onclick="openCalculator('duct')">
                            <i class="fas fa-calculator"></i>
                            Tính toán ngay
                        </button>
                    </div>

                    <div class="calc-tool animate-on-scroll">
                        <div class="tool-icon">
                            <i class="fas fa-thermometer-half"></i>
                        </div>
                        <h3>Tính Tổn Thất Nhiệt Đường Ống Nước Nóng</h3>
                        <p>Tính toán tổn thất nhiệt và độ dày cách nhiệt kinh tế cho hệ thống đường ống nước nóng trung tâm.</p>
                        <div class="tool-features">
                            <div class="feature-item">
                                <i class="fas fa-check"></i>
                                <span>Tính tổn thất nhiệt chính xác</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-check"></i>
                                <span>Tối ưu hóa chi phí vận hành</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-check"></i>
                                <span>Nhiều loại vật liệu cách nhiệt</span>
                            </div>
                        </div>
                        <button class="calc-btn" onclick="openCalculator('hotwater')">
                            <i class="fas fa-calculator"></i>
                            Tính toán ngay
                        </button>
                    </div>

                    <div class="calc-tool animate-on-scroll">
                        <div class="tool-icon">
                            <i class="fas fa-database"></i>
                        </div>
                        <h3>Tính Tổn Thất Nhiệt Trên Tanks</h3>
                        <p>Tính toán cách nhiệt cho bồn chứa, tanks công nghiệp với các hình dạng và kích thước khác nhau.</p>
                        <div class="tool-features">
                            <div class="feature-item">
                                <i class="fas fa-check"></i>
                                <span>Bồn cylindrical & spherical</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-check"></i>
                                <span>Tính toán diện tích bề mặt</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-check"></i>
                                <span>Phân tích ROI chi tiết</span>
                            </div>
                        </div>
                        <button class="calc-btn" onclick="openCalculator('tanks')">
                            <i class="fas fa-calculator"></i>
                            Tính toán ngay
                        </button>
                    </div>

                    <div class="calc-tool animate-on-scroll">
                        <div class="tool-icon">
                            <i class="fas fa-snowflake"></i>
                        </div>
                        <h3>Tính Độ Dày Cách Nhiệt Ống Chiller</h3>
                        <p>Công cụ chuyên biệt cho hệ thống chiller, tính toán độ dày cách nhiệt ngăn ngừa đọng sương hiệu quả.</p>
                        <div class="tool-features">
                            <div class="feature-item">
                                <i class="fas fa-check"></i>
                                <span>Ngăn ngừa đọng sương 100%</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-check"></i>
                                <span>Tối ưu cho nhiệt độ thấp</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-check"></i>
                                <span>Phù hợp PU Foam foam</span>
                            </div>
                        </div>
                        <button class="calc-btn" onclick="openCalculator('chiller')">
                            <i class="fas fa-calculator"></i>
                            Tính toán ngay
                        </button>
                    </div>
                </div>

                <div class="calc-benefits animate-on-scroll">
                    <h3>Lợi Ích Của 3iCalc</h3>
                    <div class="benefits-grid">
                        <div class="benefit-item">
                            <i class="fas fa-coins"></i>
                            <div>
                                <h4>Tối Ưu Chi Phí</h4>
                                <p>Cân nhắc chi phí đầu tư bảo ôn ban đầu và chi phí vận hành hàng năm để đưa ra độ dày kinh tế nhất</p>
                            </div>
                        </div>
                        <div class="benefit-item">
                            <i class="fas fa-chart-line"></i>
                            <div>
                                <h4>Tính Toán Chính Xác</h4>
                                <p>Sử dụng các công thức và tiêu chuẩn quốc tế được công nhận trong ngành cách nhiệt</p>
                            </div>
                        </div>
                        <div class="benefit-item">
                            <i class="fas fa-clock"></i>
                            <div>
                                <h4>Tiết Kiệm Thời Gian</h4>
                                <p>Giảm thời gian thiết kế từ 70% so với tính toán thủ công, tăng hiệu suất làm việc</p>
                            </div>
                        </div>
                        <div class="benefit-item">
                            <i class="fas fa-file-alt"></i>
                            <div>
                                <h4>Báo Cáo Chi Tiết</h4>
                                <p>Tạo báo cáo kỹ thuật chuyên nghiệp với biểu đồ, bảng tính và khuyến nghị cụ thể</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="calc-cta animate-on-scroll">
                    <h3>Cần Hỗ Trợ Tính Toán Cụ Thể?</h3>
                    <p>Đội ngũ kỹ sư của 3igreen sẵn sàng hỗ trợ tư vấn và tính toán cách nhiệt cho dự án của bạn</p>
                    <div class="cta-buttons">
                        <a href="#contact" class="btn btn-primary">
                            <i class="fas fa-phone"></i>
                            Tư vấn miễn phí
                        </a>
                        <a href="mailto:technical@3igreen.com.vn" class="btn btn-outline" style="color: var(--white); border-color: rgba(255,255,255,0.5);">
                            <i class="fas fa-envelope"></i>
                            Gửi yêu cầu kỹ thuật
                        </a>
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
            let start = 0;
            const isPercentage = target.toString().includes('%');
            const isPlus = target.toString().includes('+');
            const targetNumber = parseInt(target.toString().replace(/[^\d]/g, ''));
            const increment = targetNumber / (duration / 16);
            
            function updateCounter() {
                start += increment;
                if (start < targetNumber) {
                    let displayValue = Math.floor(start);
                    if (isPercentage) displayValue += '%';
                    if (isPlus) displayValue += '+';
                    element.textContent = displayValue;
                    requestAnimationFrame(updateCounter);
                } else {
                    element.textContent = target;
                }
            }
            updateCounter();
        }

        // Stats Animation Observer
        const statsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const numbers = entry.target.querySelectorAll('.stat-number, .number');
                    numbers.forEach(number => {
                        const target = number.textContent;
                        animateCounter(number, target);
                    });
                    statsObserver.unobserve(entry.target);
                }
            });
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