<?php

get_header(); ?>
<div class="container-single adjust">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php  
        $ref =  get_post_meta(get_the_ID(), 'reference', true);
        $type= get_post_meta(get_the_ID(), 'type', true);
        $post_date = get_the_date('Y');


				?>
			<div class="post__content single">
				<div class="single-img">
				<?php
						the_post_thumbnail();
				?>
				</div>
				<div class="txt">
					<h2 class='title'><?php the_title() ?></h2>
					<div class="acf">
						<p class="ref">Référence :
							<?php echo $ref; ?>
						</p>
						<p class="cat">Catégorie :
							<?php echo the_terms(get_the_ID(), 'categorie', false);?>
						</p>
						<p class="type">Type :
							<?php echo $type ?>
						</p>
						<p class="format">Format :
							<?php echo the_terms(get_the_ID(), 'format'); ?>
						</p>
						<p>annee:
							<?php echo $post_date;
							?>
						</p>
					</div>
				</div>
			</div>
		</article>
<?php endwhile;
endif; ?>

<div class='after'>
	<div class='after-txt'>
		<div>
		<p>Cette photo vous interresse?</p>
		</div>
		<div class="wrapper">
  		<button class="wrapper-button form-contact-class" id="formContact" data-ref="<?php echo esc_attr($ref)?>"><span>Contact</span></button>
		</div>
		
	</div>
	<div class="navigation-links">
		<div class="previous">
			<?php
			$previous_post = get_previous_post();
			if (!empty($previous_post)) {
				$previous_thumbnail = get_the_post_thumbnail($previous_post->ID, 'thumbnail');
				$upload_dir = wp_get_upload_dir();
				$svg_path = $upload_dir['baseurl'] . '/2023/06/arrow-left.svg';
				$previous_link = '<a href="' . get_permalink($previous_post->ID) . '">';
				$previous_link .= '<img  src="' . $svg_path . '" alt="Photo suivante">';
				$previous_link .= '</a>';
				previous_post_link('%link', $previous_thumbnail .  $previous_link);
			}
			?>
		</div>
		<div class="next">
			<?php
			$next_post = get_next_post();
			if (!empty($next_post)) {
				$next_thumbnail = get_the_post_thumbnail($next_post->ID, 'thumbnail');
				$upload_dir = wp_get_upload_dir();
				$svg_path = $upload_dir['baseurl'] . '/2023/06/arrow-right.svg';
				$next_link = '<a href="' . get_permalink($next_post->ID) . '">';
				$next_link .= '<img  src="' . $svg_path . '" alt="Photo suivante">';
				$next_link .= '</a>';
				next_post_link('%link', $next_thumbnail .  $next_link);
			}
			?>
		</div>
	</div>
</div>
<?php get_template_part('template_parts/photo_blocks');?>

<div class="btn-random">
	<div class="wrapper randomModifyer">
	<a class="wrapper-button " href="<?php echo home_url(); ?>/#galerie"><span>Toutes les photos</a>
	</div>
</div>

<?php get_footer(); ?>