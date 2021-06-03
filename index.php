<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

	
	<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
	
    <script src="js/jquerys.min.js" type="text/javascript"></script>

    <script src="js/jquery.min.js" type="text/javascript"></script>

    <script src="js/jqueryss.min.js" type="text/javascript"></script>


    <script type='text/javascript'>

jQuery(document).ready(function($){
	//update these values if you change these breakpoints in the style.css file (or _layout.scss if you use SASS)
	var MqM= 768,
		MqL = 1024;

	var faqsSections = $('.cd-faq-group'),
		faqTrigger = $('.cd-faq-trigger'),
		faqsContainer = $('.cd-faq-items'),
		faqsCategoriesContainer = $('.cd-faq-categories'),
		faqsCategories = faqsCategoriesContainer.find('a'),
		closeFaqsContainer = $('.cd-close-panel');
	
	//select a faq section 
	faqsCategories.on('click', function(event){
		event.preventDefault();
		var selectedHref = $(this).attr('href'),
			target= $(selectedHref);
		if( $(window).width() < MqM) {
			faqsContainer.scrollTop(0).addClass('slide-in').children('ul').removeClass('selected').end().children(selectedHref).addClass('selected');
			closeFaqsContainer.addClass('move-left');
			$('body').addClass('cd-overlay');
		} else {
	        $('body,html').animate({ 'scrollTop': target.offset().top - 20}, 400); 
		}
	});

	//close faq lateral panel - mobile only
	$('body').bind('click touchstart', function(event){
		if( $(event.target).is('body.cd-overlay') || $(event.target).is('.cd-close-panel')) { 
			closePanel(event);
		}
	});
	faqsContainer.on('swiperight', function(event){
		closePanel(event);
	});

	//show faq content clicking on faqTrigger
	faqTrigger.on('click', function(event){
		event.preventDefault();
		$(this).next('.cd-faq-content').slideToggle(200).end().parent('li').toggleClass('content-visible');
	});

	//update category sidebar while scrolling
	$(window).on('scroll', function(){
		if ( $(window).width() > MqL ) {
			(!window.requestAnimationFrame) ? updateCategory() : window.requestAnimationFrame(updateCategory); 
		}
	});

	$(window).on('resize', function(){
		if($(window).width() <= MqL) {
			faqsCategoriesContainer.removeClass('is-fixed').css({
				'-moz-transform': 'translateY(0)',
			    '-webkit-transform': 'translateY(0)',
				'-ms-transform': 'translateY(0)',
				'-o-transform': 'translateY(0)',
				'transform': 'translateY(0)',
			});
		}	
		if( faqsCategoriesContainer.hasClass('is-fixed') ) {
			faqsCategoriesContainer.css({
				'left': faqsContainer.offset().left,
			});
		}
	});

	function closePanel(e) {
		e.preventDefault();
		faqsContainer.removeClass('slide-in').find('li').show();
		closeFaqsContainer.removeClass('move-left');
		$('body').removeClass('cd-overlay');
	}

	function updateCategory(){
		updateCategoryPosition();
		updateSelectedCategory();
	}

	function updateCategoryPosition() {
		var top = $('.cd-faq').offset().top,
			height = jQuery('.cd-faq').height() - jQuery('.cd-faq-categories').height(),
			margin = 20;
		if( top - margin <= $(window).scrollTop() && top - margin + height > $(window).scrollTop() ) {
			var leftValue = faqsCategoriesContainer.offset().left,
				widthValue = faqsCategoriesContainer.width();
			faqsCategoriesContainer.addClass('is-fixed').css({
				'left': leftValue,
				'top': margin,
				'-moz-transform': 'translateZ(0)',
			    '-webkit-transform': 'translateZ(0)',
				'-ms-transform': 'translateZ(0)',
				'-o-transform': 'translateZ(0)',
				'transform': 'translateZ(0)',
			});
		} else if( top - margin + height <= $(window).scrollTop()) {
			var delta = top - margin + height - $(window).scrollTop();
			faqsCategoriesContainer.css({
				'-moz-transform': 'translateZ(0) translateY('+delta+'px)',
			    '-webkit-transform': 'translateZ(0) translateY('+delta+'px)',
				'-ms-transform': 'translateZ(0) translateY('+delta+'px)',
				'-o-transform': 'translateZ(0) translateY('+delta+'px)',
				'transform': 'translateZ(0) translateY('+delta+'px)',
			});
		} else { 
			faqsCategoriesContainer.removeClass('is-fixed').css({
				'left': 0,
				'top': 0,
			});
		}
	}

	function updateSelectedCategory() {
		faqsSections.each(function(){
			var actual = $(this),
				margin = parseInt($('.cd-faq-title').eq(1).css('marginTop').replace('px', '')),
				activeCategory = $('.cd-faq-categories a[href="#'+actual.attr('id')+'"]'),
				topSection = (activeCategory.parent('li').is(':first-child')) ? 0 : Math.round(actual.offset().top);
			
			if ( ( topSection - 20 <= $(window).scrollTop() ) && ( Math.round(actual.offset().top) + actual.height() + margin - 20 > $(window).scrollTop() ) ) {
				activeCategory.addClass('selected');
			}else {
				activeCategory.removeClass('selected');
			}
		});
	}
});

</script>

    

	<title>FAQ  | Micky Kenya</title>

</head>










<body>
	
<header>
	<h1> FAQ </h1>
</header>
<section class="cd-faq">
	<ul class="cd-faq-categories">
		<li><a class="selected" href="#basics">Basics</a></li>
		<li><a href="#mobile">Mobile</a></li>
		<li><a href="#account">Account</a></li>
		<li><a href="#payments">Payments</a></li>
		<li><a href="#privacy">Privacy</a></li>
		<li><a href="#delivery">Delivery</a></li>
	</ul> <!-- cd-faq-categories -->

	<div class="cd-faq-items">
		<ul id="basics" class="cd-faq-group">
			<li class="cd-faq-title"><h2>Basics</h2></li>
			<li>
				<a class="cd-faq-trigger" href="#0">How do I change my password?</a>
				<div class="cd-faq-content">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae quidem blanditiis delectus corporis, possimus officia sint sequi ex tenetur id impedit est pariatur iure animi non a ratione reiciendis nihil sed consequatur atque repellendus fugit perspiciatis rerum et. Dolorum consequuntur fugit deleniti, soluta fuga nobis. Ducimus blanditiis velit sit iste delectus obcaecati debitis omnis, assumenda accusamus cumque perferendis eos aut quidem! Aut, totam rerum, cupiditate quae aperiam voluptas rem inventore quas, ex maxime culpa nam soluta labore at amet nihil laborum? Explicabo numquam, sit fugit, voluptatem autem atque quis quam voluptate fugiat earum rem hic, reprehenderit quaerat tempore at. Aperiam.</p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0">How do I sign up?</a>
				<div class="cd-faq-content">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi cupiditate et laudantium esse adipisci consequatur modi possimus accusantium vero atque excepturi nobis in doloremque repudiandae soluta non minus dolore voluptatem enim reiciendis officia voluptates, fuga ullam? Voluptas reiciendis cumque molestiae unde numquam similique quas doloremque non, perferendis doloribus necessitatibus itaque dolorem quam officia atque perspiciatis dolore laudantium dolor voluptatem eligendi? Aliquam nulla unde voluptatum molestiae, eos fugit ullam, consequuntur, saepe voluptas quaerat deleniti. Repellendus magni sint temporibus, accusantium rem commodi?</p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0">Can I remove a post?</a>
				<div class="cd-faq-content">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis provident officiis, reprehenderit numquam. Praesentium veritatis eos tenetur magni debitis inventore fugit, magnam, reiciendis, saepe obcaecati ex vero quaerat distinctio velit.</p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0">How do reviews work?</a>
				<div class="cd-faq-content">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis provident officiis, reprehenderit numquam. Praesentium veritatis eos tenetur magni debitis inventore fugit, magnam, reiciendis, saepe obcaecati ex vero quaerat distinctio velit.</p>
				</div> <!-- cd-faq-content -->
			</li>
		</ul> <!-- cd-faq-group -->

		<ul id="mobile" class="cd-faq-group">
			<li class="cd-faq-title"><h2>Mobile</h2></li>
			<li>
				<a class="cd-faq-trigger" href="#0">How does syncing work?</a>
				<div class="cd-faq-content">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit quidem delectus rerum eligendi mollitia, repudiandae quae beatae. Et repellat quam atque corrupti iusto architecto impedit explicabo repudiandae qui similique aut iure ipsum quis inventore nulla error aliquid alias quia dolorem dolore, odio excepturi veniam odit veritatis. Quo iure magnam, et cum. Laudantium, eaque non? Tempore nihil corporis cumque dolor ipsum accusamus sapiente aliquid quis ea assumenda deserunt praesentium voluptatibus, accusantium a mollitia necessitatibus nostrum voluptatem numquam modi ab, sint rem.</p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0">How do I upload files from my phone or tablet?</a>
				<div class="cd-faq-content">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi tempore, placeat quisquam rerum! Eligendi fugit dolorum tenetur modi fuga nisi rerum, autem officiis quaerat quos. Magni quia, quo quibusdam odio. Error magni aperiam amet architecto adipisci aspernatur! Officia, quaerat magni architecto nostrum magnam fuga nihil, ipsum laboriosam similique voluptatibus facilis nobis? Eius non asperiores, nesciunt suscipit veniam blanditiis veritatis provident possimus iusto voluptas, eveniet architecto quidem quos molestias, aperiam eum reprehenderit dolores ad deserunt eos amet. Vero molestiae commodi unde dolor dicta maxime alias, velit, nesciunt cum dolorem, ipsam soluta sint suscipit maiores mollitia assumenda ducimus aperiam neque enim! Quas culpa dolorum ipsam? Ipsum voluptatibus numquam natus? Eligendi explicabo eos, perferendis voluptatibus hic sed ipsam rerum maiores officia! Beatae, molestias!</p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0">How do I link to a file or folder?</a>
				<div class="cd-faq-content">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis provident officiis, reprehenderit numquam. Praesentium veritatis eos tenetur magni debitis inventore fugit, magnam, reiciendis, saepe obcaecati ex vero quaerat distinctio velit.</p>
				</div> <!-- cd-faq-content -->
			</li>
		</ul> <!-- cd-faq-group -->

		<ul id="account" class="cd-faq-group">
			<li class="cd-faq-title"><h2>Account</h2></li>
			<li>
				<a class="cd-faq-trigger" href="#0">How do I change my password?</a>
				<div class="cd-faq-content">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis earum autem consectetur labore eius tenetur esse, in temporibus sequi cum voluptatem vitae repellat nostrum odio perspiciatis dolores recusandae necessitatibus, unde, deserunt voluptas possimus veniam magni soluta deleniti! Architecto, quidem, totam. Fugit minus odit unde ea cupiditate ab aperiam sed dolore facere nihil laboriosam dolorum repellat deleniti aliquam fugiat laudantium delectus sint iure odio, necessitatibus rem quisquam! Ipsum praesentium quam nisi sint, impedit sapiente facilis laudantium mollitia quae fugiat similique. Dolor maiores aliquid incidunt commodi doloremque rem! Quaerat, debitis voluptatem vero qui enim, sunt reiciendis tempore inventore maxime quasi fugiat accusamus beatae modi voluptates iste officia esse soluta tempora labore quisquam fuga, cum. Sint nemo iste nulla accusamus quam qui quos, vero, minus id. Eius mollitia consequatur fugit nam consequuntur nesciunt illo id quis reprehenderit obcaecati voluptates corrupti, minus! Possimus, perspiciatis!</p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0">How do I delete my account?</a>
				<div class="cd-faq-content">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo tempore soluta, minus magnam non blanditiis dolore, in nam voluptas nobis minima deserunt deleniti id animi amet, suscipit consequuntur corporis nihil laborum facere temporibus. Qui inventore, doloribus facilis, provident soluta voluptas excepturi perspiciatis fugiat odit vero! Optio assumenda animi at! Assumenda doloremque nemo est sequi eaque, ipsum id, labore rem nisi, amet similique vel autem dolore totam facilis deserunt. Mollitia non ut libero unde accusamus praesentium sint maiores, illo, nemo aliquid?</p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0">How do I change my account settings?</a>
				<div class="cd-faq-content">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis provident officiis, reprehenderit numquam. Praesentium veritatis eos tenetur magni debitis inventore fugit, magnam, reiciendis, saepe obcaecati ex vero quaerat distinctio velit.</p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0">I forgot my password. How do I reset it?</a>
				<div class="cd-faq-content">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum at aspernatur iure facere ab a corporis mollitia molestiae quod omnis minima, est labore quidem nobis accusantium ad totam sunt doloremque laudantium impedit similique iste quasi cum! Libero fugit at praesentium vero. Maiores non consequuntur rerum, nemo a qui repellat quibusdam architecto voluptatem? Sequi, possimus, cupiditate autem soluta ipsa rerum officiis cum libero delectus explicabo facilis, odit ullam aperiam reprehenderit! Vero ad non harum veritatis tempore beatae possimus, ex odio quo.</p>
				</div> <!-- cd-faq-content -->
			</li>
		</ul> <!-- cd-faq-group -->

		<ul id="payments" class="cd-faq-group">
			<li class="cd-faq-title"><h2>Payments</h2></li>
			<li>
				<a class="cd-faq-trigger" href="#0">Can I have an invoice for my subscription?</a>
				<div class="cd-faq-content">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit quidem delectus rerum eligendi mollitia, repudiandae quae beatae. Et repellat quam atque corrupti iusto architecto impedit explicabo repudiandae qui similique aut iure ipsum quis inventore nulla error aliquid alias quia dolorem dolore, odio excepturi veniam odit veritatis. Quo iure magnam, et cum. Laudantium, eaque non? Tempore nihil corporis cumque dolor ipsum accusamus sapiente aliquid quis ea assumenda deserunt praesentium voluptatibus, accusantium a mollitia necessitatibus nostrum voluptatem numquam modi ab, sint rem.</p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0">Why did my credit card or PayPal payment fail?</a>
				<div class="cd-faq-content">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur accusantium dolorem vel, ad, nostrum natus eos, nemo placeat quos nisi architecto rem dolorum amet consectetur molestiae reprehenderit cum harum commodi beatae necessitatibus. Mollitia a nostrum enim earum minima doloribus illum autem, provident vero et, aspernatur quae sunt illo dolorem. Corporis blanditiis, unde, neque, adipisci debitis quas ullam accusantium repudiandae eum nostrum quis! Velit esse harum qui, modi ratione debitis alias laboriosam minus eaque, quod, itaque labore illo totam aut quia fuga nemo. Perferendis ipsa laborum atque assumenda tempore aspernatur a eos harum non id commodi excepturi quaerat ullam, explicabo, incidunt ipsam, accusantium quo magni ut! Ratione, magnam. Delectus nesciunt impedit praesentium sed, aliquam architecto dolores quae, distinctio consectetur obcaecati esse, consequuntur vel sit quis blanditiis possimus dolorum. Eaque architecto doloremque aliquid quae cumque, vitae perferendis enim, iure fugiat, soluta aut!</p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0">Why does my bank statement show multiple charges for one upgrade?</a>
				<div class="cd-faq-content">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis provident officiis, reprehenderit numquam. Praesentium veritatis eos tenetur magni debitis inventore fugit, magnam, reiciendis, saepe obcaecati ex vero quaerat distinctio velit.</p>
				</div> <!-- cd-faq-content -->
			</li>
		</ul> <!-- cd-faq-group -->

		<ul id="privacy" class="cd-faq-group">
			<li class="cd-faq-title"><h2>Privacy</h2></li>
			<li>
				<a class="cd-faq-trigger" href="#0">Can I specify my own private key?</a>
				<div class="cd-faq-content">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit quidem delectus rerum eligendi mollitia, repudiandae quae beatae. Et repellat quam atque corrupti iusto architecto impedit explicabo repudiandae qui similique aut iure ipsum quis inventore nulla error aliquid alias quia dolorem dolore, odio excepturi veniam odit veritatis. Quo iure magnam, et cum. Laudantium, eaque non? Tempore nihil corporis cumque dolor ipsum accusamus sapiente aliquid quis ea assumenda deserunt praesentium voluptatibus, accusantium a mollitia necessitatibus nostrum voluptatem numquam modi ab, sint rem.</p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0">My files are missing! How do I get them back?</a>
				<div class="cd-faq-content">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis provident officiis, reprehenderit numquam. Praesentium veritatis eos tenetur magni debitis inventore fugit, magnam, reiciendis, saepe obcaecati ex vero quaerat distinctio velit.</p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0">How can I access my account data?</a>
				<div class="cd-faq-content">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus magni vero deserunt enim et quia in aliquam, rem tempore voluptas illo nisi veritatis quas quod placeat ipsa! Error qui harum accusamus incidunt at libero ipsum, suscipit dolorum esse explicabo in eius voluptates quidem voluptatem inventore amet eaque deserunt veniam dignissimos excepturi? Dolore, quo amet nostrum autem nemo. Sit nam assumenda, corporis ea sunt distinctio nostrum doloribus alias, beatae nesciunt dolore saepe consequuntur minima eveniet porro dolor officiis maiores ab obcaecati officia enim aliquam. Itaque fuga molestiae hic accusantium atque corporis quia id sequi enim vero? Hic aperiam sint facilis aliquam quia, accusamus tenetur earum totam enim est, error. Iusto, reiciendis necessitatibus molestias. Voluptatibus eos explicabo repellat nesciunt nam vero minima.</p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0">How can I control if other search engines can link to my profile?</a>
				<div class="cd-faq-content">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis provident officiis, reprehenderit numquam. Praesentium veritatis eos tenetur magni debitis inventore fugit, magnam, reiciendis, saepe obcaecati ex vero quaerat distinctio velit.</p>
				</div> <!-- cd-faq-content -->
			</li>
		</ul> <!-- cd-faq-group -->

		<ul id="delivery" class="cd-faq-group">
			<li class="cd-faq-title"><h2>Delivery</h2></li>
			<li>
				<a class="cd-faq-trigger" href="#0">What should I do if my order hasn't been delivered yet?</a>
				<div class="cd-faq-content">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit quidem delectus rerum eligendi mollitia, repudiandae quae beatae. Et repellat quam atque corrupti iusto architecto impedit explicabo repudiandae qui similique aut iure ipsum quis inventore nulla error aliquid alias quia dolorem dolore, odio excepturi veniam odit veritatis. Quo iure magnam, et cum. Laudantium, eaque non? Tempore nihil corporis cumque dolor ipsum accusamus sapiente aliquid quis ea assumenda deserunt praesentium voluptatibus, accusantium a mollitia necessitatibus nostrum voluptatem numquam modi ab, sint rem.</p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0">How can I find your international delivery information?</a>
				<div class="cd-faq-content">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis provident officiis, reprehenderit numquam. Praesentium veritatis eos tenetur magni debitis inventore fugit, magnam, reiciendis, saepe obcaecati ex vero quaerat distinctio velit.</p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0">Who takes care of shipping?</a>
				<div class="cd-faq-content">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis provident officiis, reprehenderit numquam. Praesentium veritatis eos tenetur magni debitis inventore fugit, magnam, reiciendis, saepe obcaecati ex vero quaerat distinctio velit.</p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0">How do returns or refunds work?</a>
				<div class="cd-faq-content">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit quidem delectus rerum eligendi mollitia, repudiandae quae beatae. Et repellat quam atque corrupti iusto architecto impedit explicabo repudiandae qui similique aut iure ipsum quis inventore nulla error aliquid alias quia dolorem dolore, odio excepturi veniam odit veritatis. Quo iure magnam, et cum. Laudantium, eaque non? Tempore nihil corporis cumque dolor ipsum accusamus sapiente aliquid quis ea assumenda deserunt praesentium voluptatibus, accusantium a mollitia necessitatibus nostrum voluptatem numquam modi ab, sint rem.</p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0">How do I use shipping profiles?</a>
				<div class="cd-faq-content">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis provident officiis, reprehenderit numquam. Praesentium veritatis eos tenetur magni debitis inventore fugit, magnam, reiciendis, saepe obcaecati ex vero quaerat distinctio velit.</p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0">How does your UK Next Day Delivery service work?</a>
				<div class="cd-faq-content">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis provident officiis, reprehenderit numquam. Praesentium veritatis eos tenetur magni debitis inventore fugit, magnam, reiciendis, saepe obcaecati ex vero quaerat distinctio velit.</p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0">How does your Next Day Delivery service work?</a>
				<div class="cd-faq-content">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis provident officiis, reprehenderit numquam. Praesentium veritatis eos tenetur magni debitis inventore fugit, magnam, reiciendis, saepe obcaecati ex vero quaerat distinctio velit.</p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0">When will my order arrive?</a>
				<div class="cd-faq-content">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis provident officiis, reprehenderit numquam. Praesentium veritatis eos tenetur magni debitis inventore fugit, magnam, reiciendis, saepe obcaecati ex vero quaerat distinctio velit.</p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0">When will my order ship?</a>
				<div class="cd-faq-content">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis provident officiis, reprehenderit numquam. Praesentium veritatis eos tenetur magni debitis inventore fugit, magnam, reiciendis, saepe obcaecati ex vero quaerat distinctio velit.</p>
				</div> <!-- cd-faq-content -->
			</li>
		</ul> <!-- cd-faq-group -->
	</div> <!-- cd-faq-items -->
	<a href="#0" class="cd-close-panel">Close</a>
</section> <!-- cd-faq -->
<script src="js/jquery-2.1.1.js"></script>
<script src="js/jquery.mobile.custom.min.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>