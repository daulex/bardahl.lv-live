<?php
defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

//OpenAI API key
function seopress_ai_openai_api_key_callback() {
    $docs = seopress_get_docs_links();

    $options = get_option('seopress_pro_option_name');
    $check = isset($options['seopress_ai_openai_api_key']) ? 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx' : null;

    printf('<input id="seopress_ai_openai_api_key" type="password" name="seopress_pro_option_name[seopress_ai_openai_api_key]" autocomplete="off" spellcheck="false" autocorrect="off" autocapitalize="off" value="%s" aria-label="' . __('OpenAI API key', 'wp-seopress-pro') . '"/>', esc_html($check));
    ?>
        <p class="description">
            <?php
                /* translators: %s documentation URL */
                printf(__('Sign up to <a href="%s" target="_blank">OpenAI</a> to generate your API key.', 'wp-seopress-pro'), esc_url( 'https://beta.openai.com/account/api-keys' ));
            ?>
        </p>

    <?php
    $api_key = seopress_pro_get_service('Usage')->getLicenseKey();

    if (defined( 'SEOPRESS_OPENAI_KEY' ) && ! empty( SEOPRESS_OPENAI_KEY ) && is_string( SEOPRESS_OPENAI_KEY )) {?>
        <p class="seopress-notice"><?php _e('Your OpenAI key is defined in wp-config.php.','wp-seopress-pro'); ?></p>
    <?php } ?>

    <p>
        <button type="button" id="seopress-open-ai-check-license" class="btn btnTertiary">
            <?php _e('Check OpenAI key', 'wp-seopress-pro'); ?>
        </button>
        <span class="spinner"></span>
        <div id="seopress-open-ai-check-license-log"></div>
    </p>
<?php }

//Open AI model
function seopress_ai_openai_model_callback() {
    $options = get_option('seopress_pro_option_name');

    $selected = isset($options['seopress_ai_openai_model']) ? $options['seopress_ai_openai_model'] : null; ?>

<select id="seopress_ai_openai_model" name="seopress_pro_option_name[seopress_ai_openai_model]">
    <?php
        $models = [
            'gpt-4' => __('GPT-4 / GPT-4 Vision (recommended for alt texts)','wp-seopress-pro'),
            'gpt-3.5-turbo' => __('GPT-3.5 Turbo','wp-seopress-pro'),
        ];

        if ( ! empty($models)) {
            foreach ($models as $key => $model) { ?>
    <option <?php if (esc_attr($key) == $selected) { ?>
        selected="selected"
        <?php } ?>
        value="<?php esc_attr_e($key); ?>"><?php esc_html_e($model); ?>
    </option>
    <?php }
        }
    ?>
</select>

<p class="description">
    <?php _e('Select your OpenAI model. GPT-4 requires at least 1 successful payment of $1 via the OpenAI platform.', 'wp-seopress-pro'); ?>
</p>

<?php if (isset($options['seopress_ai_openai_model'])) {
        esc_attr($options['seopress_ai_openai_model']);
    }
}

function seopress_ai_openai_alt_text_callback() {
    $options = get_option('seopress_pro_option_name');

    $check = isset($options['seopress_ai_openai_alt_text']); ?>

<label for="seopress_ai_openai_alt_text">
    <input id="seopress_ai_openai_alt_text" name="seopress_pro_option_name[seopress_ai_openai_alt_text]" type="checkbox"
        <?php if ('1' == $check) { ?>
    checked="yes"
    <?php } ?>
    value="1"/>

    <?php _e('When uploading an image file, automatically set the alternative text using AI', 'wp-seopress-pro'); ?>
</label>

<p class="description">
    <?php _e('This may slow down the image upload.', 'wp-seopress-pro'); ?>
</p>

<?php if (isset($options['seopress_ai_openai_alt_text'])) {
        esc_attr($options['seopress_ai_openai_alt_text']);
    }
}
