<?php
/**
 * menu walker
 *
 * @package Ravon
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! class_exists( 'Ravon_Menu_Walker' ) ) {
    class Ravon_Menu_Walker extends Walker_Nav_Menu {

        /**
         * Starts the list before the elements are added.
         */
        public function start_lvl( &$output, $depth = 0, $args = array() ) {
            
            if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
                $t = '';
                $n = '';
            } else {
                $t = "\t";
                $n = "\n";
            }
            $indent = str_repeat( $t, $depth );

            $classes = array( 'sub-menu' );

            $class_names = join( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
            $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

            $output .= "{$n}{$indent}<ul$class_names>{$n}";

        }

        /**
         * Ends the list of after the elements are added.
         */
        public function end_lvl( &$output, $depth = 0, $args = array() ) {
            $indent = str_repeat("\t", $depth);
            
            if( $depth == 0){
                $this->get_first_level_menu_id = '';
            }

            $output .= "$indent</ul>\n";
        }

        /**
         * Start the element output.
         */
        public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
            
            $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

            $class_names = $value = '';

            $classes = empty( $item->classes ) ? array() : (array) $item->classes;

            $classes[] = 'menu-item-depth-' . $depth;
            $classes[] = 'nav-item';

            switch ( $depth ) {
                case 0:
                    if ( $item -> hasChildren ) {
                       $classes[] = "dropdown";
                    }
                break;
            }
            
            $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
            $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

            $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
            $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

            $output .= $indent . '<li' . $id . $value . $class_names .'>';
            $classes[] = 'menu-item-' . $item->ID;

            $atts = array();
            $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
            $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
            $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
            $atts['href']   = ! empty( $item->url )        ? $item->url        : '';
			
			if ( $item -> hasChildren ) {
				$atts['class']  		= 'nav-link dropdown-toggle';
				$atts['data-toggle']	= 'dropdown';
				$atts['aria-haspopup']	= 'true';
				$atts['aria-expanded']	= 'false';
			} else {
				$atts['class']  = 'nav-link';
			}

            $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

            $attributes = '';
            foreach ( $atts as $attr => $value ) {
                if ( ! empty( $value ) ) {
                    $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                    $attributes .= ' ' . $attr . '="' . $value . '"';
                }
            }

            $item_output = $args->before;

    		$item_output .= '<a'. $attributes .'>';

            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;

            $item_output .= '</a>';

            $item_output .= $args->after;

            /**
             * Filter a menu item's starting output.
             */
            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }

        /**
         * Ends the element output, if needed.
         */
        public function end_el( &$output, $item, $depth = 0, $args = array() ) {
            $output .= "</li>\n";
        }

        function display_element( $element, &$children_elements, $max_depth, $depth = 0, $args, &$output ) {

            // check, whether there are children for the given ID and append it to the element with a (new) ID
            $element->hasChildren = isset( $children_elements[ $element->ID ] ) && ! empty( $children_elements[ $element->ID ] );
            return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
        }
    }
}