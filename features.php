<?php
/**
 * Template Name: Features Page
 *
 * Features page template showcasing product capabilities.
 *
 * @package Fieldcraft
 */

get_header();
?>

<style>
/* Features Page Specific Styles */
.features-hero {
    padding: 10rem 0 5rem;
    background: linear-gradient(180deg, var(--color-neutral-50) 0%, white 100%);
    text-align: center;
}

.features-hero-label {
    display: inline-block;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    color: var(--color-primary-700);
    background: var(--color-primary-100);
    padding: 0.5rem 1rem;
    border-radius: var(--radius-full);
    margin-bottom: 1.5rem;
}

.features-hero h1 {
    font-size: clamp(2.5rem, 5vw, 3.5rem);
    line-height: 1.1;
    color: var(--color-neutral-900);
    margin-bottom: 1.5rem;
    max-width: 700px;
    margin-left: auto;
    margin-right: auto;
}

.features-hero-text {
    font-size: 1.25rem;
    line-height: 1.7;
    color: var(--color-neutral-600);
    max-width: 600px;
    margin: 0 auto;
}

/* Feature Showcase - Alternating Layout */
.feature-showcase {
    padding: 5rem 0;
    border-bottom: 1px solid var(--color-neutral-100);
}

.feature-showcase:last-of-type {
    border-bottom: none;
}

.feature-showcase-inner {
    display: grid;
    gap: 3rem;
    align-items: center;
}

@media (min-width: 1024px) {
    .feature-showcase-inner {
        grid-template-columns: 1fr 1fr;
        gap: 5rem;
    }

    .feature-showcase.reverse .feature-showcase-inner {
        direction: rtl;
    }

    .feature-showcase.reverse .feature-showcase-inner > * {
        direction: ltr;
    }
}

.feature-showcase-content {
    max-width: 500px;
}

.feature-showcase-label {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    color: var(--color-primary-700);
    margin-bottom: 1rem;
}

.feature-showcase-label svg {
    width: 1rem;
    height: 1rem;
}

.feature-showcase h2 {
    font-size: clamp(1.75rem, 3vw, 2.25rem);
    line-height: 1.2;
    color: var(--color-neutral-900);
    margin-bottom: 1rem;
}

.feature-showcase p {
    font-size: 1.0625rem;
    line-height: 1.8;
    color: var(--color-neutral-600);
    margin-bottom: 1.5rem;
}

.feature-showcase-list {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}

.feature-showcase-list li {
    display: flex;
    align-items: flex-start;
    gap: 0.75rem;
    font-size: 0.95rem;
    color: var(--color-neutral-700);
}

.feature-showcase-list li svg {
    width: 1.25rem;
    height: 1.25rem;
    color: var(--color-primary-600);
    flex-shrink: 0;
    margin-top: 0.125rem;
}

.feature-showcase-visual {
    position: relative;
}

.feature-showcase-image {
    border-radius: var(--radius-2xl);
    overflow: hidden;
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.1);
    border: 1px solid var(--color-neutral-200);
}

.feature-showcase-image img {
    width: 100%;
    display: block;
}

/* Floating badge on images */
.feature-badge {
    position: absolute;
    background: white;
    border-radius: var(--radius-xl);
    padding: 1rem 1.25rem;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.12);
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.feature-badge-icon {
    width: 2.5rem;
    height: 2.5rem;
    background: var(--color-primary-100);
    border-radius: var(--radius-lg);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--color-primary-700);
}

.feature-badge-icon svg {
    width: 1.25rem;
    height: 1.25rem;
}

.feature-badge-text {
    font-size: 0.875rem;
    font-weight: 600;
    color: var(--color-neutral-900);
}

.feature-badge-1 {
    bottom: -1rem;
    left: -1rem;
}

.feature-badge-2 {
    top: -1rem;
    right: -1rem;
}

@media (max-width: 1023px) {
    .feature-badge {
        display: none;
    }
}

/* Capabilities Grid */
.capabilities-section {
    padding: 5rem 0;
    background: var(--color-neutral-50);
}

.capabilities-grid {
    display: grid;
    gap: 1.5rem;
    margin-top: 3rem;
}

@media (min-width: 768px) {
    .capabilities-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (min-width: 1024px) {
    .capabilities-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

.capability-card {
    background: white;
    border-radius: var(--radius-xl);
    padding: 2rem;
    border: 1px solid var(--color-neutral-200);
    transition: all 0.3s ease;
}

.capability-card:hover {
    border-color: var(--color-primary-200);
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
    transform: translateY(-2px);
}

.capability-icon {
    width: 3rem;
    height: 3rem;
    background: var(--color-primary-100);
    border-radius: var(--radius-lg);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--color-primary-700);
    margin-bottom: 1.25rem;
}

.capability-icon svg {
    width: 1.5rem;
    height: 1.5rem;
}

.capability-card h3 {
    font-family: var(--font-display);
    font-size: 1.125rem;
    font-weight: 700;
    color: var(--color-neutral-900);
    margin-bottom: 0.75rem;
}

.capability-card p {
    font-size: 0.9375rem;
    color: var(--color-neutral-600);
    line-height: 1.7;
}

/* Comparison Section */
.comparison-section {
    padding: 5rem 0;
    background: white;
}

.comparison-table-wrapper {
    margin-top: 3rem;
    overflow-x: auto;
}

.comparison-table {
    width: 100%;
    min-width: 600px;
    border-collapse: collapse;
}

.comparison-table th,
.comparison-table td {
    padding: 1.25rem 1.5rem;
    text-align: left;
    border-bottom: 1px solid var(--color-neutral-200);
}

.comparison-table th {
    font-family: var(--font-display);
    font-size: 0.875rem;
    font-weight: 700;
    color: var(--color-neutral-900);
    background: var(--color-neutral-50);
}

.comparison-table th:first-child {
    border-radius: var(--radius-lg) 0 0 0;
}

.comparison-table th:last-child {
    border-radius: 0 var(--radius-lg) 0 0;
}

.comparison-table td {
    font-size: 0.9375rem;
    color: var(--color-neutral-700);
}

.comparison-table td:first-child {
    font-weight: 500;
    color: var(--color-neutral-900);
}

.comparison-table .highlight-col {
    background: var(--color-primary-50);
}

.comparison-table th.highlight-col {
    background: var(--color-primary-700);
    color: white;
}

.check-icon {
    color: var(--color-primary-600);
}

.cross-icon {
    color: var(--color-neutral-300);
}

/* Integration Logos */
.integrations-section {
    padding: 5rem 0;
    background: var(--color-neutral-50);
}

.integrations-logos {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1rem;
    margin-top: 3rem;
}

@media (min-width: 768px) {
    .integrations-logos {
        grid-template-columns: repeat(4, 1fr);
    }
}

@media (min-width: 1024px) {
    .integrations-logos {
        grid-template-columns: repeat(6, 1fr);
    }
}

.integration-logo {
    aspect-ratio: 2/1;
    background: white;
    border: 1px solid var(--color-neutral-200);
    border-radius: var(--radius-xl);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 1rem;
    font-family: var(--font-display);
    font-weight: 600;
    font-size: 0.875rem;
    color: var(--color-neutral-500);
    transition: all 0.2s ease;
}

.integration-logo:hover {
    border-color: var(--color-primary-300);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
}

/* Features CTA */
.features-cta {
    padding: 5rem 0;
    background: var(--color-primary-800);
    text-align: center;
    position: relative;
    overflow: hidden;
}

.features-cta::before {
    content: "";
    position: absolute;
    inset: 0;
    background-image: radial-gradient(rgba(255,255,255,0.05) 1px, transparent 1px);
    background-size: 24px 24px;
    pointer-events: none;
}

.features-cta h2 {
    font-size: clamp(1.75rem, 4vw, 2.5rem);
    color: white;
    margin-bottom: 1rem;
    position: relative;
}

.features-cta p {
    color: rgba(255, 255, 255, 0.8);
    font-size: 1.125rem;
    max-width: 500px;
    margin: 0 auto 2rem;
    position: relative;
}

.features-cta .btn {
    position: relative;
}

.features-cta-buttons {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
    position: relative;
}
</style>

<!-- Hero Section -->
<section class="features-hero">
    <div class="container">
        <div class="reveal">
            <span class="features-hero-label">Features</span>
            <h1>Everything you need to run your business smarter</h1>
            <p class="features-hero-text">
                Powerful tools designed to streamline your workflow, boost productivity, and help your team achieve more together.
            </p>
        </div>
    </div>
</section>

<!-- Feature Showcase 1: Dashboard -->
<section class="feature-showcase">
    <div class="container">
        <div class="feature-showcase-inner">
            <div class="feature-showcase-content reveal">
                <span class="feature-showcase-label">
                    <?php echo fieldcraft_icon("chart"); ?>
                    Analytics Dashboard
                </span>
                <h2>Real-time insights at your fingertips</h2>
                <p>
                    Get a complete view of your business performance with our intuitive dashboard. Track key metrics, monitor trends, and make data-driven decisions with confidence.
                </p>
                <ul class="feature-showcase-list">
                    <li>
                        <?php echo fieldcraft_icon("check"); ?>
                        <span>Customizable widgets and layouts</span>
                    </li>
                    <li>
                        <?php echo fieldcraft_icon("check"); ?>
                        <span>Real-time data synchronization</span>
                    </li>
                    <li>
                        <?php echo fieldcraft_icon("check"); ?>
                        <span>Export reports in multiple formats</span>
                    </li>
                </ul>
            </div>
            <div class="feature-showcase-visual reveal reveal-delay-1">
                <div class="feature-showcase-image">
                    <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=600&h=400&fit=crop" alt="Analytics dashboard">
                </div>
                <div class="feature-badge feature-badge-1">
                    <div class="feature-badge-icon">
                        <?php echo fieldcraft_icon("lightning"); ?>
                    </div>
                    <span class="feature-badge-text">Live Updates</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Feature Showcase 2: Team Collaboration -->
<section class="feature-showcase reverse">
    <div class="container">
        <div class="feature-showcase-inner">
            <div class="feature-showcase-content reveal">
                <span class="feature-showcase-label">
                    <?php echo fieldcraft_icon("users"); ?>
                    Team Collaboration
                </span>
                <h2>Work together, wherever you are</h2>
                <p>
                    Break down silos and keep everyone aligned. Share projects, assign tasks, and communicate seamlessly with built-in collaboration tools.
                </p>
                <ul class="feature-showcase-list">
                    <li>
                        <?php echo fieldcraft_icon("check"); ?>
                        <span>Shared workspaces and projects</span>
                    </li>
                    <li>
                        <?php echo fieldcraft_icon("check"); ?>
                        <span>In-app messaging and comments</span>
                    </li>
                    <li>
                        <?php echo fieldcraft_icon("check"); ?>
                        <span>Role-based access controls</span>
                    </li>
                </ul>
            </div>
            <div class="feature-showcase-visual reveal reveal-delay-1">
                <div class="feature-showcase-image">
                    <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=600&h=400&fit=crop" alt="Team collaboration">
                </div>
                <div class="feature-badge feature-badge-2">
                    <div class="feature-badge-icon">
                        <?php echo fieldcraft_icon("users"); ?>
                    </div>
                    <span class="feature-badge-text">12 Team Members</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Feature Showcase 3: Automation -->
<section class="feature-showcase">
    <div class="container">
        <div class="feature-showcase-inner">
            <div class="feature-showcase-content reveal">
                <span class="feature-showcase-label">
                    <?php echo fieldcraft_icon("settings"); ?>
                    Smart Automation
                </span>
                <h2>Automate the busywork</h2>
                <p>
                    Save hours every week by automating repetitive tasks. Set up workflows that run on autopilot so your team can focus on what matters most.
                </p>
                <ul class="feature-showcase-list">
                    <li>
                        <?php echo fieldcraft_icon("check"); ?>
                        <span>Visual workflow builder</span>
                    </li>
                    <li>
                        <?php echo fieldcraft_icon("check"); ?>
                        <span>Trigger-based automation rules</span>
                    </li>
                    <li>
                        <?php echo fieldcraft_icon("check"); ?>
                        <span>Pre-built automation templates</span>
                    </li>
                </ul>
            </div>
            <div class="feature-showcase-visual reveal reveal-delay-1">
                <div class="feature-showcase-image">
                    <img src="https://images.unsplash.com/photo-1518186285589-2f7649de83e0?w=600&h=400&fit=crop" alt="Automation workflows">
                </div>
                <div class="feature-badge feature-badge-1">
                    <div class="feature-badge-icon">
                        <?php echo fieldcraft_icon("lightning"); ?>
                    </div>
                    <span class="feature-badge-text">10hrs Saved/Week</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Capabilities Grid -->
<section class="capabilities-section">
    <div class="container">
        <div class="section-header reveal">
            <h2 class="text-display">More powerful capabilities</h2>
            <p style="font-size: 1.125rem; color: var(--color-neutral-600); max-width: 500px; margin: 1rem auto 0;">
                Discover all the tools designed to help your business thrive.
            </p>
        </div>

        <div class="capabilities-grid">
            <div class="capability-card reveal">
                <div class="capability-icon">
                    <?php echo fieldcraft_icon("globe"); ?>
                </div>
                <h3>Global Reach</h3>
                <p>Multi-language support and localization for teams across the world.</p>
            </div>

            <div class="capability-card reveal reveal-delay-1">
                <div class="capability-icon">
                    <?php echo fieldcraft_icon("code"); ?>
                </div>
                <h3>API Access</h3>
                <p>Full REST API for custom integrations and extending functionality.</p>
            </div>

            <div class="capability-card reveal reveal-delay-2">
                <div class="capability-icon">
                    <?php echo fieldcraft_icon("star"); ?>
                </div>
                <h3>Priority Support</h3>
                <p>Dedicated support team with guaranteed response times.</p>
            </div>

            <div class="capability-card reveal">
                <div class="capability-icon">
                    <?php echo fieldcraft_icon("chart"); ?>
                </div>
                <h3>Advanced Reports</h3>
                <p>Custom report builder with scheduling and automated delivery.</p>
            </div>

            <div class="capability-card reveal reveal-delay-1">
                <div class="capability-icon">
                    <?php echo fieldcraft_icon("settings"); ?>
                </div>
                <h3>Custom Fields</h3>
                <p>Tailor Fieldcraft to your workflow with unlimited custom fields.</p>
            </div>

            <div class="capability-card reveal reveal-delay-2">
                <div class="capability-icon">
                    <?php echo fieldcraft_icon("lightning"); ?>
                </div>
                <h3>Mobile Apps</h3>
                <p>Stay productive on the go with native iOS and Android apps.</p>
            </div>
        </div>
    </div>
</section>

<!-- Comparison Section -->
<section class="comparison-section">
    <div class="container">
        <div class="section-header reveal">
            <h2 class="text-display">See how we compare</h2>
            <p style="font-size: 1.125rem; color: var(--color-neutral-600); max-width: 500px; margin: 1rem auto 0;">
                Fieldcraft delivers more value than traditional solutions.
            </p>
        </div>

        <div class="comparison-table-wrapper reveal">
            <table class="comparison-table">
                <thead>
                    <tr>
                        <th>Feature</th>
                        <th class="highlight-col">Fieldcraft</th>
                        <th>Others</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Real-time collaboration</td>
                        <td class="highlight-col"><span class="check-icon"><?php echo fieldcraft_icon("check", 20); ?></span></td>
                        <td><span class="cross-icon"><?php echo fieldcraft_icon("close", 20); ?></span></td>
                    </tr>
                    <tr>
                        <td>Unlimited projects</td>
                        <td class="highlight-col"><span class="check-icon"><?php echo fieldcraft_icon("check", 20); ?></span></td>
                        <td><span class="check-icon"><?php echo fieldcraft_icon("check", 20); ?></span></td>
                    </tr>
                    <tr>
                        <td>Advanced automation</td>
                        <td class="highlight-col"><span class="check-icon"><?php echo fieldcraft_icon("check", 20); ?></span></td>
                        <td><span class="cross-icon"><?php echo fieldcraft_icon("close", 20); ?></span></td>
                    </tr>
                    <tr>
                        <td>API access</td>
                        <td class="highlight-col"><span class="check-icon"><?php echo fieldcraft_icon("check", 20); ?></span></td>
                        <td>Paid add-on</td>
                    </tr>
                    <tr>
                        <td>24/7 support</td>
                        <td class="highlight-col"><span class="check-icon"><?php echo fieldcraft_icon("check", 20); ?></span></td>
                        <td><span class="cross-icon"><?php echo fieldcraft_icon("close", 20); ?></span></td>
                    </tr>
                    <tr>
                        <td>Custom integrations</td>
                        <td class="highlight-col"><span class="check-icon"><?php echo fieldcraft_icon("check", 20); ?></span></td>
                        <td>Limited</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- Integrations Section -->
<section class="integrations-section">
    <div class="container">
        <div class="section-header reveal">
            <h2 class="text-display">Integrates with your stack</h2>
            <p style="font-size: 1.125rem; color: var(--color-neutral-600); max-width: 500px; margin: 1rem auto 0;">
                Connect Fieldcraft to the tools you already use and love.
            </p>
        </div>

        <div class="integrations-logos reveal">
            <div class="integration-logo">Slack</div>
            <div class="integration-logo">Zapier</div>
            <div class="integration-logo">Salesforce</div>
            <div class="integration-logo">HubSpot</div>
            <div class="integration-logo">Stripe</div>
            <div class="integration-logo">GitHub</div>
            <div class="integration-logo">Notion</div>
            <div class="integration-logo">Figma</div>
            <div class="integration-logo">Jira</div>
            <div class="integration-logo">Asana</div>
            <div class="integration-logo">Dropbox</div>
            <div class="integration-logo">Google</div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="features-cta">
    <div class="container">
        <div class="reveal">
            <h2>Ready to see it in action?</h2>
            <p>Start your free trial today and discover how Fieldcraft can transform your workflow.</p>
            <div class="features-cta-buttons">
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-accent btn-lg">
                    Start Free Trial <?php echo fieldcraft_icon("arrow-right"); ?>
                </a>
                <a href="<?php echo esc_url(home_url('/pricing')); ?>" class="btn btn-outline btn-lg" style="border-color: white; color: white;">
                    View Pricing <?php echo fieldcraft_icon("arrow-right"); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
