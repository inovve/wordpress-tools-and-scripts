add_action('wp_footer', function () {
    if (!is_product()) return;

    global $product;
    $length = (float) $product->get_length();
    $width  = (float) $product->get_width();

    if ($length > 0 && $width > 0) {
        $sqm_per_unit = ($length / 100) * ($width / 100);
        ?>
        <script>
        document.addEventListener('DOMContentLoaded', function () {
            const observer = new MutationObserver(() => {
                const form = document.querySelector('form.cart');
                const qtyInput = form?.querySelector('input.qty');
                const plusBtn = form?.querySelector('.plus');
                const minusBtn = form?.querySelector('.minus');
                const addToCartBtn = form?.querySelector('button.single_add_to_cart_button');

                if (qtyInput && addToCartBtn && !document.getElementById('sqm-result')) {
                    const sqmPerUnit = <?php echo esc_js($sqm_per_unit); ?>;

                    const resultDiv = document.createElement('div');
                    resultDiv.id = 'sqm-result';
                    resultDiv.style.marginTop = '10px';
                    resultDiv.style.fontWeight = 'bold';
                    addToCartBtn.insertAdjacentElement('afterend', resultDiv);

                    const updateSqm = () => {
                        const qty = parseFloat(qtyInput.value) || 0;
                        const sqm = (qty * sqmPerUnit).toFixed(2);
                        resultDiv.textContent = `Está a comprar ${qty} unidade(s) = ${sqm} m²`;
                    };

                    qtyInput.addEventListener('input', updateSqm);
                    qtyInput.addEventListener('change', updateSqm);
                    plusBtn?.addEventListener('click', () => setTimeout(updateSqm, 10));
                    minusBtn?.addEventListener('click', () => setTimeout(updateSqm, 10));

                    updateSqm();
                    observer.disconnect();
                }
            });

            observer.observe(document.body, { childList: true, subtree: true });
        });
        </script>
        <?php
    }
});
