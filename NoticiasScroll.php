function noticias_scroll_shortcode() {
  ob_start(); // Inicia el buffer de salida
  ?>
	<div class="container-scroll">
	   <?php
        $recent_posts = wp_get_recent_posts([
          'numberposts' => 10,
          'post_status' => 'publish'
        ]);
		 foreach($recent_posts as $post) {
			$thumb_url = get_the_post_thumbnail_url($post["ID"], 'thumbnail');
      		if ($thumb_url) {
        	echo '<div><img alt="" src="' . esc_url($thumb_url) . '"/><div><a href="' . get_permalink($post["ID"]) . '"><h1>' . esc_html($post["post_title"]) . '</h1></a></div></div>';
      			}
        }
        ?>
    </div>
  	<style>
	*{
    font-family: Arial, Helvetica, sans-serif;
	}
	.container-scroll{
    	display: flex;
		width: 1000px;
    	height: 316px;
    	overflow-x: scroll;
    	overflow-y: hidden;
    	overscroll-behavior-x: smooth;
    	scroll-snap-type: x proximity;
    	gap: 15px;
		}

	.container-scroll div{
    	position: relative;
    	scroll-snap-align: center;
    	margin: 0 15px 0 0;
    	height: 100%;
		}
		.container-scroll div img{
    	height: 100%;
		}
	.container-scroll div div{
    	width: 100%;
    	height: 30%;
    	background-color:#F2F8F6;
    	position: absolute;
    	bottom: 0;
    	left: 50%;
    	transform: translate(-50%, -50%);
		}
	.container-scroll div div h1{
    	display: flex;
    	justify-content: center;
    	align-content: center;
			}
	.container-scroll div div a, .container-scroll div div a:active, .container-scroll div div a:visited {
    	text-decoration: none;
    	color: #C32D53;
			}
  	</style>
  	<?php
  	return ob_get_clean(); // Devuelve el contenido del buffer
	}
add_shortcode('noticias_scroll', 'noticias_scroll_shortcode');
