            </main>
        <!-- FOOTER -->
        <footer class="text-light p-4">
            <div class="container">
                <p><?php echo sprintf( __( '%1$s %2$s %3$s', 'kisetsucon' ), '&copy;', date( 'Y' ), esc_html( get_bloginfo( 'name' ) ) ); ?></p>
            </div>
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>