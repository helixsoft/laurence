<?php
/**
 * @author  PressBooks <code@pressbooks.org>
 * @license GPLv2 (or any later version)
 */


/**
 * Google Webfonts
 */
function laurence_enqueue_styles() {
	wp_enqueue_style( 'laurence-fonts', 'http://fonts.googleapis.com/css?family=Noto+Serif:400,400italic,700,700italic|Pathway+Gothic+One|Marcellus+SC|Marcellus&subset=latin,latin-ext' );
}
add_action( 'wp_print_styles', 'laurence_enqueue_styles' );


/**
 * Aonham features we inject ourselves, (not user options)
 *
 * @param $css
 *
 * @return string
 */
function laurence_theme_pdf_css_override( $css ) {

	// Translate "Part" to whatever language this book is in
	$css .= '#toc .part a::before { content: "' . __( 'Part', 'pressbooks' ) . ' "counter(part) ". "; }' . "\n";
	$css .= 'div.part-title-wrap > h3.part-number:before { content: "' . __( 'part', 'pressbooks' ) . ' "; }' . "\n";

	return $css;
}
add_filter( 'pb_pdf_css_override', 'laurence_theme_pdf_css_override' );


/**
 * Austen features we inject ourselves, (not user options)
 *
 * @param $css
 *
 * @return string
 */
function laurence_theme_ebook_css_override( $css ) {

	// Translate "Part" to whatever language this book is in
	$css .= 'div.part-title-wrap > h3.part-number:before { content: "' . __( 'part', 'pressbooks' ) . ' "; }' . "\n";

	return $css;
}
add_filter( 'pb_epub_css_override', 'laurence_theme_ebook_css_override' );