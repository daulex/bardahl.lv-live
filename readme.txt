location ~ (([^/]*)sitemap(.*)|news|author|video(.*))\.x(m|s)l$ {
## SEOPress
rewrite ^.*/sitemaps\.xml$ /index.php?seopress_sitemap=1 last;
rewrite ^.*/news.xml$ /index.php?seopress_news=1 last;
rewrite ^.*/video([0-9]+)?.xml$ /index.php?seopress_video=1&seopress_paged=$1 last;
rewrite ^.*/author.xml$ /index.php?seopress_author=1 last;
rewrite ^.*/sitemaps_xsl\.xsl$ /index.php?seopress_sitemap_xsl=1 last;
rewrite ^.*/sitemaps_video_xsl\.xsl$ /index.php?seopress_sitemap_video_xsl=1 last;
rewrite ^.*/([^/]+?)-sitemap([0-9]+)?.xml$ /index.php?seopress_cpt=$1&seopress_paged=$2 last;
}