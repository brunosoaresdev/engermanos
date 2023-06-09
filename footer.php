<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.1
 */
?>

	<section class="py-20 bg-gray bg-opacity-10">
		<div class="container flex flex-wrap sm:flex-nowrap items-center justify-between mx-auto px-5 sm:px-0 ">
			<h2
				class="relative font-bold text-5xl text-black-light mr-20 mb-20 sm:mb-0
				before:absolute before:left-0 before:-bottom-8 before:w-1/3 before:h-1 before:bg-orange"
			>
				<?php the_field('title_clients', get_option('page_on_front')); ?>
			</h2>
			
			<?php $clients = get_field('clients', get_option('page_on_front')); ?>
			<div class="gallery-clients flex w-full xl:max-w-2/3 2xl:max-w-7xl">
				<?php foreach ($clients as $client) : ?>
					<div class="flex items-center">
						<figure class="flex items-center justify-center m-0"><img src="<?php echo $client['url']; ?>" alt=""></figure>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<footer
		id="footer"
		role="contentinfo"
		class="bg-black-light py-7 text-white relative px-5 sm:px-0
			before:content-[''] before:block before:absolute before:inset-0 before:bg-right-bottom before:bg-footerAfter before:bg-no-repeat before:z-10"
	>
		<div class="relative z-20 container mx-auto flex justify-between flex-wrap">
			<div class="flex flex-col justify-between">
				<div class="text-white text-3xl sm:text-5xl font-bold mb-10 sm:mb-0"><?php the_field('slogan_info', get_option('page_on_front')); ?></div>
				<?php
					$logotipo = get_field( 'logotipo', get_option('page_on_front') );
					if ( $logotipo ) :
				?>
					<a
						class="mb-10 sm:mb-0"
						href="<?php echo home_url( '/' ); ?>"
					>
						<img class="mx-w-2/3 sm:max-w-full" src="<?php echo $logotipo['url']; ?>" />
					</a>
				<?php endif; ?>
			</div>

			<nav>
				<?php
					wp_nav_menu([
						'menu'            => 'principal',
						'container'       => 'ul',
						'theme_location'  => 'top',
						'menu_class'			=> 'menu__footer flex flex-col gap-4'
					]);
				?>

				<p class="text-gray mt-14">© <?php echo date('Y') ?> - <?php bloginfo( 'name' ); ?></p>
			</nav>

			<ul class="mt-20 sm:mt-0">
				<li class="flex items-center mb-8">
					<figure class="relative w-12 h-10 flex items-center justify-center m-0 mr-4 z-10 before:bg-orange before:absolute before:inset-0 before:-skew-x-12 before:-z-10 before:rounded">
						<img src="<?php images_url('ico-address.svg'); ?>" />
					</figure>
					<?php the_field('address_info', get_option('page_on_front')); ?>
				</li>
				<li class="flex items-center mb-8">
					<figure class="relative w-12 h-10 flex items-center justify-center m-0 mr-4 z-10 before:bg-orange before:absolute before:inset-0 before:-skew-x-12 before:-z-10 before:rounded">
						<img src="<?php images_url('ico-whatsapp.svg'); ?>" />
					</figure>
					<span class="phoneMask"><?php the_field('phone_info', get_option('page_on_front')); ?></span>
				</li>
				<?php if ( get_field('instagram_info', get_option('page_on_front')) ): ?>
				<li class="flex items-center mb-8">
					<figure class="relative w-12 h-10 flex items-center justify-center m-0 mr-4 z-10 before:bg-orange before:absolute before:inset-0 before:-skew-x-12 before:-z-10 before:rounded">
						<img src="<?php images_url('ico-instagram.svg'); ?>" />
					</figure>
					<a
						href="https://instagram.com/<?php the_field('instagram_info', get_option('page_on_front')); ?>"
						target="_blank"
					>
						@<?php the_field('instagram_info', get_option('page_on_front')); ?>
					</a>
				</li>
				<?php endif; ?>
			</ul>
		</div>

		<div class="container mx-auto flex justify-center items-center mt-10">
			<?php _partials('_signature') ?>
		</div>
	</footer>

	<?php
		$services = get_field('services', get_option('page_on_front'));
		foreach ($services as $service) :
	?>
		<div
			id="defaultModal-<?php echo $service->ID; ?>"
			class="modal <?php echo $service->post_name; ?>"
		>
			<div class="modal__container relative">
				<?php if ( wp_is_mobile() ): ?>
					<div class="flex items-center justify-between relative z-50 mb-10 text-white">
						<h2 class="font-bold text-2xl uppercase"><?php echo $service->post_title; ?></h2>
						<button class="close"><i class="fa-regular fa-circle-xmark text-xl"></i></button>
					</div>
					<div
						class="absoulte z-30 w-full absolute inset-0 m-auto bg-center bg-no-repeat bg-cover
						before:content[-] before:block before:bg-black/60 before:inset-0 before:m-auto before:z-40 before:h-full"
						style="background-image: url(<?php echo get_the_post_thumbnail_url($service->ID); ?>);"
					>
					</div>
					<div class="flex items-center justify-between relative z-50">
						<div class="w-full flex justify-center font-medium text-white text-xl">
							<?php echo $service->post_content; ?>
						</div>
					</div>
				<?php else : ?>
				
					<?php if ( $service->post_name === 'construcao-civil' || $service->post_name === 'terraplanagem' ) : ?>
						<div class="flex items-center justify-between relative z-50 mb-10">
							<h2 class="text-black-light font-bold text-3xl sm:text-5xl uppercase"><?php echo $service->post_title; ?></h2>
							<button class="close"><i class="fa-regular fa-circle-xmark text-xl"></i></button>
						</div>
						<div class="absoulte z-40 bg-cover block max-w-1/2 w-1/2 absolute top-0 bottom-0 right-0 bg-center" style="background-image: url(<?php echo get_the_post_thumbnail_url($service->ID); ?>);"></div>
						<div class="flex items-center w-1/2 justify-between relative z-50">
							<div class="max-w-1/2 w-full text-xl">
								<?php echo $service->post_content; ?>
							</div>
						</div>

					<?php else : ?>
						<div class="flex items-center justify-between relative z-50 mb-10 text-white">
							<h2 class="font-bold text-3xl uppercase"><?php echo $service->post_title; ?></h2>
							<button class="close"><i class="fa-regular fa-circle-xmark text-xl"></i></button>
						</div>
						<div
							class="absoulte z-30 w-full absolute inset-0 m-auto bg-center bg-no-repeat bg-cover
							before:content[-] before:block before:bg-black/60 before:inset-0 before:m-auto before:z-40 before:h-full"
							style="background-image: url(<?php echo get_the_post_thumbnail_url($service->ID); ?>);"
						>
						</div>
						<div class="flex items-center justify-between relative z-50">
							<div class="w-full flex justify-center font-medium text-white text-xl">
								<?php echo $service->post_content; ?>
							</div>
						</div>
					<?php endif; ?>

				<?php endif; ?>
			</div>
		</div>
	<?php endforeach; ?>

	<?php wp_footer(); ?>
	<script>jQuery(document).ready(function ($) { $('.preloader').delay(400).fadeOut(500); });</script>
</body>
</html>