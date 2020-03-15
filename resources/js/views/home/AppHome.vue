<template>
    <div>
        
	<section class="blog-area section">
		<div class="container">

			<div class="row">

				<div class="col-lg-4 col-md-6">
					<post-card></post-card>
				</div>
                <div class="col-lg-4 col-md-6">
					<post-card></post-card>
				</div>
                <div class="col-lg-4 col-md-6">
					<post-card></post-card>
				</div>

				<div class="col-lg-8 col-md-12">
					<big-post-card></big-post-card>
				</div>

				<div class="col-lg-4 col-md-6">
					<post-card/>
				</div>

				<div class="col-lg-4 col-md-6">
					<post-card/>
				</div>

                <div class="col-lg-4 col-md-6">
					<post-card/>
				</div>

				<div class="col-lg-4 col-md-6">
					<tiny-post-card/>
				</div>

				<div class="col-lg-4 col-md-6">
					<tiny-post-card/>
				</div>

				<div class="col-lg-8 col-md-12">
					<big-post-card/>
				</div>

			</div>

			<a class="load-more-btn" href="#"><b>CARGAR MÁS</b></a>

		</div>
	</section>
    </div>
</template>
<script>

    import PostCard from '../../components/PostCard';
    import BigPostCard from '../../components/BigPostCard';
    import TinyPostCard from '../../components/TinyPostCard';

    export default {
        components: {
            'post-card': PostCard,
            'big-post-card': BigPostCard,
            'tiny-post-card': TinyPostCard
        }
    }
</script>