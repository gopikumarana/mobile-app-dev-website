<?php
echo "hai";
// Get the current page from URL parameter, default to 'home'
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// Define valid pages to prevent directory traversal
$valid_pages = ['home', 'about', 'contact'];
if (!in_array($page, $valid_pages)) {
    $page = 'home';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ucfirst($page); ?> - AppCraft Solutions</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: bold;
            color: #667eea;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        .nav-links a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            transition: all 0.3s ease;
        }

        .nav-links a:hover,
        .nav-links a.active {
            background: #667eea;
            color: white;
            transform: translateY(-2px);
        }

        main {
            padding: 2rem 0;
        }

        .content-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 3rem;
            margin: 2rem 0;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            animation: fadeInUp 0.6s ease;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h1 {
            color: #667eea;
            font-size: 2.5rem;
            margin-bottom: 1rem;
            text-align: center;
        }

        h2 {
            color: #667eea;
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .hero {
            text-align: center;
            padding: 2rem 0;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            color: #666;
        }

        .cta-button {
            display: inline-block;
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            padding: 1rem 2rem;
            text-decoration: none;
            border-radius: 50px;
            font-weight: bold;
            transition: all 0.3s ease;
            margin: 1rem 0;
        }

        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }

        .services {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin: 2rem 0;
        }

        .service-card {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .service-card:hover {
            transform: translateY(-5px);
        }

        .service-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin: 2rem 0;
        }

        .team-member {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .contact-form {
            max-width: 600px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
            color: #333;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 1rem;
            border: 2px solid #e1e1e1;
            border-radius: 10px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #667eea;
        }

        .contact-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .contact-item {
            text-align: center;
            padding: 1.5rem;
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        footer {
            background: rgba(0, 0, 0, 0.8);
            color: white;
            text-align: center;
            padding: 2rem 0;
            margin-top: 3rem;
        }

        @media (max-width: 768px) {
            .nav-links {
                gap: 1rem;
            }

            .nav-links a {
                padding: 0.3rem 0.7rem;
                font-size: 0.9rem;
            }

            h1 {
                font-size: 2rem;
            }

            .content-card {
                padding: 2rem 1.5rem;
            }

            .services {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <nav>
                <a href="?page=home" class="logo">📱 AppCraft Solutions</a>
                <ul class="nav-links">
                    <li><a href="?page=home" class="<?php echo $page === 'home' ? 'active' : ''; ?>">Home</a></li>
                    <li><a href="?page=about" class="<?php echo $page === 'about' ? 'active' : ''; ?>">About Us</a></li>
                    <li><a href="?page=contact" class="<?php echo $page === 'contact' ? 'active' : ''; ?>">Contact Us</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <div class="container">
            <?php if ($page === 'home'): ?>
                <div class="content-card">
                    <div class="hero">
                        <h1>Transform Your Ideas Into Powerful Mobile Apps</h1>
                        <p>We create stunning, user-friendly mobile applications for iOS and Android that drive business growth and engage your audience.</p>
                        <a href="?page=contact" class="cta-button">Start Your Project Today</a>
                    </div>
                </div>

                <div class="content-card">
                    <h2>Our Services</h2>
                    <div class="services">
                        <div class="service-card">
                            <div class="service-icon">📱</div>
                            <h3>iOS Development</h3>
                            <p>Native iOS apps built with Swift and SwiftUI for optimal performance and user experience on iPhones and iPads.</p>
                        </div>
                        <div class="service-card">
                            <div class="service-icon">🤖</div>
                            <h3>Android Development</h3>
                            <p>Custom Android applications using Kotlin and Java, designed to work seamlessly across all Android devices.</p>
                        </div>
                        <div class="service-card">
                            <div class="service-icon">🔄</div>
                            <h3>Cross-Platform</h3>
                            <p>Cost-effective solutions using React Native and Flutter to deploy your app on both platforms simultaneously.</p>
                        </div>
                        <div class="service-card">
                            <div class="service-icon">🎨</div>
                            <h3>UI/UX Design</h3>
                            <p>Beautiful, intuitive designs that provide exceptional user experiences and drive engagement.</p>
                        </div>
                        <div class="service-card">
                            <div class="service-icon">☁️</div>
                            <h3>Backend Solutions</h3>
                            <p>Robust server-side development and cloud integration to power your mobile applications.</p>
                        </div>
                        <div class="service-card">
                            <div class="service-icon">🔧</div>
                            <h3>App Maintenance</h3>
                            <p>Ongoing support, updates, and maintenance to keep your app running smoothly and securely.</p>
                        </div>
                    </div>
                </div>

            <?php elseif ($page === 'about'): ?>
                <div class="content-card">
                    <h1>About AppCraft Solutions</h1>
                    <p>Founded in 2018, AppCraft Solutions has been at the forefront of mobile app development, helping businesses of all sizes bring their digital visions to life. We combine cutting-edge technology with creative design to deliver exceptional mobile experiences.</p>
                    
                    <h2>Our Mission</h2>
                    <p>To empower businesses by creating innovative mobile solutions that drive growth, enhance user engagement, and provide measurable results. We believe in the power of technology to transform ideas into reality.</p>

                    <h2>Why Choose Us?</h2>
                    <div class="services">
                        <div class="service-card">
                            <div class="service-icon">⚡</div>
                            <h3>Fast Delivery</h3>
                            <p>We use agile development methodologies to deliver high-quality apps quickly without compromising on quality.</p>
                        </div>
                        <div class="service-card">
                            <div class="service-icon">💡</div>
                            <h3>Innovation</h3>
                            <p>We stay ahead of the latest trends and technologies to ensure your app is built with the most current tools.</p>
                        </div>
                        <div class="service-card">
                            <div class="service-icon">🤝</div>
                            <h3>Partnership</h3>
                            <p>We work closely with our clients as partners, ensuring your vision is realized exactly as you imagined.</p>
                        </div>
                    </div>
                </div>

                <div class="content-card">
                    <h2>Our Team</h2>
                    <div class="team-grid">
                        <div class="team-member">
                            <h3>Sarah Johnson</h3>
                            <p><strong>CEO & Founder</strong></p>
                            <p>10+ years in mobile development and business strategy. Former senior developer at major tech companies.</p>
                        </div>
                        <div class="team-member">
                            <h3>Mike Chen</h3>
                            <p><strong>Lead iOS Developer</strong></p>
                            <p>Expert in Swift and iOS ecosystem with 8 years of experience building award-winning apps.</p>
                        </div>
                        <div class="team-member">
                            <h3>Emily Rodriguez</h3>
                            <p><strong>Android Specialist</strong></p>
                            <p>Kotlin expert with passion for creating smooth, efficient Android applications that users love.</p>
                        </div>
                        <div class="team-member">
                            <h3>David Park</h3>
                            <p><strong>UI/UX Designer</strong></p>
                            <p>Creative designer focused on user-centered design and creating intuitive mobile experiences.</p>
                        </div>
                    </div>
                </div>

            <?php elseif ($page === 'contact'): ?>
                <div class="content-card">
                    <h1>Contact Us</h1>
                    <p>Ready to bring your mobile app idea to life? Get in touch with us today for a free consultation and project quote.</p>

                    <div class="contact-info">
                        <div class="contact-item">
                            <div class="service-icon">📍</div>
                            <h3>Address</h3>
                            <p>123 Tech Street<br>Innovation District<br>San Francisco, CA 94107</p>
                        </div>
                        <div class="contact-item">
                            <div class="service-icon">📞</div>
                            <h3>Phone</h3>
                            <p>+1 (555) 123-4567</p>
                        </div>
                        <div class="contact-item">
                            <div class="service-icon">✉️</div>
                            <h3>Email</h3>
                            <p>hello@appcraftsolutions.com</p>
                        </div>
                    </div>

                    <form class="contact-form" method="POST" action="">
                        <div class="form-group">
                            <label for="name">Full Name *</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address *</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="company">Company Name</label>
                            <input type="text" id="company" name="company">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" name="phone">
                        </div>
                        <div class="form-group">
                            <label for="project">Project Type</label>
                            <select id="project" name="project" style="width: 100%; padding: 1rem; border: 2px solid #e1e1e1; border-radius: 10px; font-size: 1rem;">
                                <option value="">Select a project type</option>
                                <option value="ios">iOS App Development</option>
                                <option value="android">Android App Development</option>
                                <option value="cross-platform">Cross-Platform Development</option>
                                <option value="design">UI/UX Design</option>
                                <option value="maintenance">App Maintenance</option>
                                <option value="consultation">Consultation</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="message">Project Details *</label>
                            <textarea id="message" name="message" rows="5" placeholder="Tell us about your app idea, target audience, key features, and any specific requirements..." required></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="cta-button" style="border: none; cursor: pointer; width: 100%;">Send Message</button>
                        </div>
                    </form>

                    <?php
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        echo '<div style="background: #d4edda; color: #155724; padding: 1rem; border-radius: 10px; margin-top: 1rem; text-align: center;">';
                        echo 'Thank you for your message! We\'ll get back to you within 24 hours.';
                        echo '</div>';
                    }
                    ?>
                </div>
            <?php endif; ?>
        </div>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2025 AppCraft Solutions. All rights reserved. | Building the future of mobile experiences.</p>
        </div>
    </footer>
</body>
</html>
