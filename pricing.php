<?php
/**
 * Template Name: Pricing Page
 *
 * Pricing page template with plans and FAQ.
 *
 * @package Fieldcraft
 */

get_header();
?>

<style>
/* Pricing Page Specific Styles */
.pricing-hero {
    padding: 10rem 0 5rem;
    background: var(--color-primary-800);
    text-align: center;
    position: relative;
    overflow: hidden;
}

.pricing-hero::before {
    content: "";
    position: absolute;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 150%;
    height: 100%;
    background: radial-gradient(ellipse at center top, rgba(139, 92, 246, 0.3) 0%, transparent 60%);
    pointer-events: none;
}

.pricing-hero h1 {
    font-size: clamp(2.5rem, 5vw, 3.5rem);
    line-height: 1.1;
    color: white;
    margin-bottom: 1rem;
    position: relative;
}

.pricing-hero-text {
    font-size: 1.25rem;
    line-height: 1.7;
    color: rgba(255, 255, 255, 0.8);
    max-width: 550px;
    margin: 0 auto;
    position: relative;
}

/* Billing Toggle */
.billing-toggle {
    display: inline-flex;
    align-items: center;
    gap: 1rem;
    margin-top: 2rem;
    background: rgba(255, 255, 255, 0.1);
    padding: 0.5rem;
    border-radius: var(--radius-full);
    position: relative;
}

.billing-option {
    padding: 0.75rem 1.5rem;
    font-size: 0.9rem;
    font-weight: 500;
    color: rgba(255, 255, 255, 0.7);
    border-radius: var(--radius-full);
    cursor: pointer;
    transition: all 0.2s ease;
}

.billing-option.is-active {
    background: white;
    color: var(--color-primary-800);
}

.billing-save {
    position: absolute;
    top: -0.5rem;
    right: -1rem;
    background: var(--color-accent-400);
    color: var(--color-primary-900);
    font-size: 0.7rem;
    font-weight: 700;
    padding: 0.25rem 0.5rem;
    border-radius: var(--radius-full);
}

/* Pricing Cards Section */
.pricing-cards-section {
    padding: 5rem 0;
    background: var(--color-neutral-50);
    margin-top: -3rem;
    position: relative;
    z-index: 1;
}

.pricing-cards-grid {
    display: grid;
    gap: 1.5rem;
    max-width: 1100px;
    margin: 0 auto;
}

@media (min-width: 768px) {
    .pricing-cards-grid {
        grid-template-columns: repeat(3, 1fr);
        align-items: start;
    }
}

.pricing-card-wrapper {
    position: relative;
}

.pricing-card-popular {
    position: absolute;
    top: -0.75rem;
    left: 50%;
    transform: translateX(-50%);
    background: var(--color-accent-400);
    color: var(--color-primary-900);
    font-size: 0.75rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    padding: 0.375rem 1rem;
    border-radius: var(--radius-full);
    white-space: nowrap;
}

.pricing-card-new {
    background: white;
    border-radius: var(--radius-2xl);
    padding: 2.5rem 2rem;
    border: 1px solid var(--color-neutral-200);
    text-align: center;
    transition: all 0.3s ease;
}

.pricing-card-new:hover {
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
}

.pricing-card-new.is-featured {
    background: var(--color-primary-700);
    border-color: var(--color-primary-600);
    transform: scale(1.05);
    box-shadow: 0 25px 50px rgba(45, 27, 78, 0.3);
}

@media (max-width: 767px) {
    .pricing-card-new.is-featured {
        transform: none;
    }
}

.pricing-card-new.is-featured * {
    color: white;
}

.pricing-card-new.is-featured .pricing-card-price span {
    color: rgba(255, 255, 255, 0.6);
}

.pricing-card-new.is-featured .pricing-feature-item svg {
    color: var(--color-accent-400);
}

.pricing-card-new.is-featured .btn-outline {
    border-color: white;
    color: white;
}

.pricing-card-new.is-featured .btn-outline:hover {
    background: white;
    color: var(--color-primary-700);
}

.pricing-card-icon {
    width: 3.5rem;
    height: 3.5rem;
    margin: 0 auto 1.5rem;
    background: var(--color-primary-100);
    border-radius: var(--radius-xl);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--color-primary-700);
}

.pricing-card-new.is-featured .pricing-card-icon {
    background: rgba(255, 255, 255, 0.15);
    color: white;
}

.pricing-card-icon svg {
    width: 1.5rem;
    height: 1.5rem;
}

.pricing-card-name {
    font-family: var(--font-display);
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--color-neutral-900);
    margin-bottom: 0.5rem;
}

.pricing-card-desc {
    font-size: 0.9rem;
    color: var(--color-neutral-500);
    margin-bottom: 1.5rem;
}

.pricing-card-price {
    font-family: var(--font-display);
    font-size: 3rem;
    font-weight: 700;
    color: var(--color-neutral-900);
    line-height: 1;
    margin-bottom: 0.5rem;
}

.pricing-card-price span {
    font-size: 1rem;
    font-weight: 400;
    color: var(--color-neutral-500);
}

.pricing-card-billing {
    font-size: 0.8rem;
    color: var(--color-neutral-400);
    margin-bottom: 2rem;
}

.pricing-features-list {
    text-align: left;
    margin-bottom: 2rem;
}

.pricing-feature-item {
    display: flex;
    align-items: flex-start;
    gap: 0.75rem;
    padding: 0.625rem 0;
    font-size: 0.9rem;
    color: var(--color-neutral-700);
}

.pricing-feature-item svg {
    width: 1.25rem;
    height: 1.25rem;
    color: var(--color-primary-600);
    flex-shrink: 0;
    margin-top: 0.0625rem;
}

.pricing-card-new .btn {
    width: 100%;
}

/* Enterprise Section */
.enterprise-section {
    padding: 5rem 0;
    background: white;
}

.enterprise-card {
    background: linear-gradient(135deg, var(--color-neutral-900) 0%, var(--color-neutral-800) 100%);
    border-radius: var(--radius-2xl);
    padding: 3rem;
    display: grid;
    gap: 2rem;
    align-items: center;
    color: white;
}

@media (min-width: 768px) {
    .enterprise-card {
        grid-template-columns: 1fr auto;
        padding: 4rem;
    }
}

.enterprise-content h2 {
    font-size: clamp(1.5rem, 3vw, 2rem);
    color: white;
    margin-bottom: 1rem;
}

.enterprise-content p {
    font-size: 1.0625rem;
    color: rgba(255, 255, 255, 0.7);
    line-height: 1.7;
    max-width: 500px;
}

.enterprise-features {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
    margin-top: 1.5rem;
}

.enterprise-feature {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.875rem;
    color: rgba(255, 255, 255, 0.9);
}

.enterprise-feature svg {
    width: 1rem;
    height: 1rem;
    color: var(--color-accent-400);
}

/* Feature Comparison */
.comparison-section-new {
    padding: 5rem 0;
    background: var(--color-neutral-50);
}

.comparison-header {
    text-align: center;
    margin-bottom: 3rem;
}

.comparison-table-new {
    width: 100%;
    background: white;
    border-radius: var(--radius-2xl);
    overflow: hidden;
    border: 1px solid var(--color-neutral-200);
}

.comparison-table-new th,
.comparison-table-new td {
    padding: 1rem 1.5rem;
    text-align: center;
    border-bottom: 1px solid var(--color-neutral-100);
}

.comparison-table-new th:first-child,
.comparison-table-new td:first-child {
    text-align: left;
}

.comparison-table-new thead th {
    background: var(--color-neutral-50);
    font-family: var(--font-display);
    font-size: 0.9rem;
    font-weight: 700;
    color: var(--color-neutral-900);
    padding: 1.25rem 1.5rem;
}

.comparison-table-new thead th:nth-child(3) {
    background: var(--color-primary-100);
    color: var(--color-primary-800);
}

.comparison-table-new tbody td {
    font-size: 0.9rem;
    color: var(--color-neutral-600);
}

.comparison-table-new tbody td:first-child {
    font-weight: 500;
    color: var(--color-neutral-800);
}

.comparison-table-new tbody td:nth-child(3) {
    background: var(--color-primary-50);
}

.comparison-table-new tbody tr:last-child td {
    border-bottom: none;
}

.comparison-check {
    color: var(--color-primary-600);
}

.comparison-cross {
    color: var(--color-neutral-300);
}

/* FAQ Section */
.pricing-faq-section {
    padding: 5rem 0;
    background: white;
}

.faq-grid {
    display: grid;
    gap: 1.5rem;
    margin-top: 3rem;
}

@media (min-width: 768px) {
    .faq-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

.faq-card {
    background: var(--color-neutral-50);
    border-radius: var(--radius-xl);
    padding: 1.75rem;
}

.faq-card h3 {
    font-family: var(--font-display);
    font-size: 1rem;
    font-weight: 700;
    color: var(--color-neutral-900);
    margin-bottom: 0.75rem;
}

.faq-card p {
    font-size: 0.9375rem;
    color: var(--color-neutral-600);
    line-height: 1.7;
}

/* Guarantee Section */
.guarantee-section {
    padding: 4rem 0;
    background: var(--color-neutral-50);
}

.guarantee-card {
    background: white;
    border: 2px solid var(--color-primary-200);
    border-radius: var(--radius-2xl);
    padding: 3rem;
    text-align: center;
    max-width: 700px;
    margin: 0 auto;
}

.guarantee-icon {
    width: 4rem;
    height: 4rem;
    margin: 0 auto 1.5rem;
    background: var(--color-primary-100);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--color-primary-700);
}

.guarantee-icon svg {
    width: 2rem;
    height: 2rem;
}

.guarantee-card h2 {
    font-size: 1.5rem;
    color: var(--color-neutral-900);
    margin-bottom: 1rem;
}

.guarantee-card p {
    font-size: 1.0625rem;
    color: var(--color-neutral-600);
    line-height: 1.7;
    max-width: 500px;
    margin: 0 auto;
}
</style>

<!-- Hero Section -->
<section class="pricing-hero">
    <div class="container">
        <div class="reveal">
            <h1>Simple, transparent pricing</h1>
            <p class="pricing-hero-text">
                Choose the plan that fits your needs. All plans include a 14-day free trial with no credit card required.
            </p>
            <div class="billing-toggle">
                <span class="billing-option is-active" data-billing="monthly">Monthly</span>
                <span class="billing-option" data-billing="yearly">Yearly</span>
                <span class="billing-save">Save 20%</span>
            </div>
        </div>
    </div>
</section>

<!-- Pricing Cards -->
<section class="pricing-cards-section">
    <div class="container">
        <div class="pricing-cards-grid">
            <!-- Starter Plan -->
            <div class="pricing-card-wrapper reveal">
                <div class="pricing-card-new">
                    <div class="pricing-card-icon">
                        <?php echo fieldcraft_icon("star"); ?>
                    </div>
                    <h3 class="pricing-card-name">Starter</h3>
                    <p class="pricing-card-desc">Perfect for individuals and small projects</p>
                    <div class="pricing-card-price">$0 <span>/mo</span></div>
                    <p class="pricing-card-billing">Free forever</p>
                    <div class="pricing-features-list">
                        <div class="pricing-feature-item">
                            <?php echo fieldcraft_icon("check"); ?>
                            <span>Up to 3 projects</span>
                        </div>
                        <div class="pricing-feature-item">
                            <?php echo fieldcraft_icon("check"); ?>
                            <span>Basic analytics</span>
                        </div>
                        <div class="pricing-feature-item">
                            <?php echo fieldcraft_icon("check"); ?>
                            <span>1 team member</span>
                        </div>
                        <div class="pricing-feature-item">
                            <?php echo fieldcraft_icon("check"); ?>
                            <span>Community support</span>
                        </div>
                        <div class="pricing-feature-item">
                            <?php echo fieldcraft_icon("check"); ?>
                            <span>1GB storage</span>
                        </div>
                    </div>
                    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-outline">Get Started</a>
                </div>
            </div>

            <!-- Pro Plan -->
            <div class="pricing-card-wrapper reveal reveal-delay-1">
                <span class="pricing-card-popular">Most Popular</span>
                <div class="pricing-card-new is-featured">
                    <div class="pricing-card-icon">
                        <?php echo fieldcraft_icon("lightning"); ?>
                    </div>
                    <h3 class="pricing-card-name">Professional</h3>
                    <p class="pricing-card-desc">For growing teams and businesses</p>
                    <div class="pricing-card-price">$29 <span>/mo</span></div>
                    <p class="pricing-card-billing">Billed monthly</p>
                    <div class="pricing-features-list">
                        <div class="pricing-feature-item">
                            <?php echo fieldcraft_icon("check"); ?>
                            <span>Unlimited projects</span>
                        </div>
                        <div class="pricing-feature-item">
                            <?php echo fieldcraft_icon("check"); ?>
                            <span>Advanced analytics</span>
                        </div>
                        <div class="pricing-feature-item">
                            <?php echo fieldcraft_icon("check"); ?>
                            <span>Up to 10 team members</span>
                        </div>
                        <div class="pricing-feature-item">
                            <?php echo fieldcraft_icon("check"); ?>
                            <span>Priority email support</span>
                        </div>
                        <div class="pricing-feature-item">
                            <?php echo fieldcraft_icon("check"); ?>
                            <span>50GB storage</span>
                        </div>
                        <div class="pricing-feature-item">
                            <?php echo fieldcraft_icon("check"); ?>
                            <span>API access</span>
                        </div>
                    </div>
                    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-accent">Start Free Trial</a>
                </div>
            </div>

            <!-- Business Plan -->
            <div class="pricing-card-wrapper reveal reveal-delay-2">
                <div class="pricing-card-new">
                    <div class="pricing-card-icon">
                        <?php echo fieldcraft_icon("chart"); ?>
                    </div>
                    <h3 class="pricing-card-name">Business</h3>
                    <p class="pricing-card-desc">For larger teams with advanced needs</p>
                    <div class="pricing-card-price">$79 <span>/mo</span></div>
                    <p class="pricing-card-billing">Billed monthly</p>
                    <div class="pricing-features-list">
                        <div class="pricing-feature-item">
                            <?php echo fieldcraft_icon("check"); ?>
                            <span>Everything in Pro</span>
                        </div>
                        <div class="pricing-feature-item">
                            <?php echo fieldcraft_icon("check"); ?>
                            <span>Unlimited team members</span>
                        </div>
                        <div class="pricing-feature-item">
                            <?php echo fieldcraft_icon("check"); ?>
                            <span>Custom integrations</span>
                        </div>
                        <div class="pricing-feature-item">
                            <?php echo fieldcraft_icon("check"); ?>
                            <span>24/7 phone support</span>
                        </div>
                        <div class="pricing-feature-item">
                            <?php echo fieldcraft_icon("check"); ?>
                            <span>500GB storage</span>
                        </div>
                        <div class="pricing-feature-item">
                            <?php echo fieldcraft_icon("check"); ?>
                            <span>Advanced security</span>
                        </div>
                    </div>
                    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-outline">Start Free Trial</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Enterprise Section -->
<section class="enterprise-section">
    <div class="container">
        <div class="enterprise-card reveal">
            <div class="enterprise-content">
                <h2>Need something bigger?</h2>
                <p>
                    For large organizations with custom requirements, we offer tailored enterprise solutions with dedicated support, custom SLAs, and flexible deployment options.
                </p>
                <div class="enterprise-features">
                    <span class="enterprise-feature">
                        <?php echo fieldcraft_icon("check"); ?>
                        Dedicated account manager
                    </span>
                    <span class="enterprise-feature">
                        <?php echo fieldcraft_icon("check"); ?>
                        Custom contracts
                    </span>
                    <span class="enterprise-feature">
                        <?php echo fieldcraft_icon("check"); ?>
                        On-premise deployment
                    </span>
                    <span class="enterprise-feature">
                        <?php echo fieldcraft_icon("check"); ?>
                        SSO & SAML
                    </span>
                </div>
            </div>
            <div class="enterprise-cta">
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-accent btn-lg">
                    Contact Sales <?php echo fieldcraft_icon("arrow-right"); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Feature Comparison -->
<section class="comparison-section-new">
    <div class="container">
        <div class="comparison-header reveal">
            <h2 class="text-display">Compare all features</h2>
            <p style="font-size: 1.125rem; color: var(--color-neutral-600); max-width: 500px; margin: 1rem auto 0;">
                See exactly what's included in each plan.
            </p>
        </div>

        <div class="comparison-table-wrapper reveal">
            <table class="comparison-table-new">
                <thead>
                    <tr>
                        <th>Feature</th>
                        <th>Starter</th>
                        <th>Professional</th>
                        <th>Business</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Projects</td>
                        <td>3</td>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                    </tr>
                    <tr>
                        <td>Team members</td>
                        <td>1</td>
                        <td>10</td>
                        <td>Unlimited</td>
                    </tr>
                    <tr>
                        <td>Storage</td>
                        <td>1GB</td>
                        <td>50GB</td>
                        <td>500GB</td>
                    </tr>
                    <tr>
                        <td>Analytics</td>
                        <td>Basic</td>
                        <td>Advanced</td>
                        <td>Advanced</td>
                    </tr>
                    <tr>
                        <td>API access</td>
                        <td><span class="comparison-cross"><?php echo fieldcraft_icon("close", 18); ?></span></td>
                        <td><span class="comparison-check"><?php echo fieldcraft_icon("check", 18); ?></span></td>
                        <td><span class="comparison-check"><?php echo fieldcraft_icon("check", 18); ?></span></td>
                    </tr>
                    <tr>
                        <td>Custom integrations</td>
                        <td><span class="comparison-cross"><?php echo fieldcraft_icon("close", 18); ?></span></td>
                        <td><span class="comparison-cross"><?php echo fieldcraft_icon("close", 18); ?></span></td>
                        <td><span class="comparison-check"><?php echo fieldcraft_icon("check", 18); ?></span></td>
                    </tr>
                    <tr>
                        <td>Priority support</td>
                        <td><span class="comparison-cross"><?php echo fieldcraft_icon("close", 18); ?></span></td>
                        <td><span class="comparison-check"><?php echo fieldcraft_icon("check", 18); ?></span></td>
                        <td><span class="comparison-check"><?php echo fieldcraft_icon("check", 18); ?></span></td>
                    </tr>
                    <tr>
                        <td>SSO / SAML</td>
                        <td><span class="comparison-cross"><?php echo fieldcraft_icon("close", 18); ?></span></td>
                        <td><span class="comparison-cross"><?php echo fieldcraft_icon("close", 18); ?></span></td>
                        <td><span class="comparison-check"><?php echo fieldcraft_icon("check", 18); ?></span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="pricing-faq-section">
    <div class="container">
        <div class="section-header reveal">
            <h2 class="text-display">Common questions</h2>
        </div>

        <div class="faq-grid">
            <div class="faq-card reveal">
                <h3>Can I change plans later?</h3>
                <p>Yes, you can upgrade or downgrade your plan at any time. Changes take effect immediately, and we'll prorate the difference.</p>
            </div>

            <div class="faq-card reveal reveal-delay-1">
                <h3>What payment methods do you accept?</h3>
                <p>We accept all major credit cards (Visa, Mastercard, Amex) as well as PayPal. Enterprise customers can pay via invoice.</p>
            </div>

            <div class="faq-card reveal">
                <h3>Is there a long-term contract?</h3>
                <p>No, all plans are month-to-month with no long-term commitment. You can cancel anytime without penalty.</p>
            </div>

            <div class="faq-card reveal reveal-delay-1">
                <h3>Do you offer discounts for nonprofits?</h3>
                <p>Yes! We offer 50% off all plans for registered nonprofits and educational institutions. Contact us to apply.</p>
            </div>

            <div class="faq-card reveal">
                <h3>What happens when my trial ends?</h3>
                <p>After your 14-day trial, you'll be prompted to choose a plan. Your data is always safe—we keep it for 30 days if you need time to decide.</p>
            </div>

            <div class="faq-card reveal reveal-delay-1">
                <h3>Can I get a refund?</h3>
                <p>Yes, we offer a 30-day money-back guarantee on all paid plans. If you're not satisfied, just let us know.</p>
            </div>
        </div>
    </div>
</section>

<!-- Guarantee Section -->
<section class="guarantee-section">
    <div class="container">
        <div class="guarantee-card reveal">
            <div class="guarantee-icon">
                <?php echo fieldcraft_icon("star"); ?>
            </div>
            <h2>30-day money-back guarantee</h2>
            <p>
                Try Fieldcraft risk-free. If you're not completely satisfied within the first 30 days, we'll refund your payment in full—no questions asked.
            </p>
        </div>
    </div>
</section>

<?php get_footer(); ?>
