<template>

    <div>
        <div class="single-post info-area">

            <div class="about-area">
                <h4 class="title"><b>ABOUT BONA</b></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                    ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur
                    Ut enim ad minim veniam</p>
            </div>

            <div :class="{'sidebar-area': true ,'subscribe-area': true, 'pl-0 pr-0': from === 'POST'}">

                <h4 class="title"><b>SUBSCRIBE</b></h4>
                <div class="input-area">
                    <form>
                        <input class="email-input" type="text" placeholder="Enter your email">
                        <button class="submit-btn" type="submit"><i class="ion-ios-email-outline"></i></button>
                    </form>
                </div>

            </div>

            <div :class="{'tag-area': true , 'pl-0 pr-0': from === 'POST'}">

                <h4 class="title"><b>TAG CLOUD</b></h4>
                <ul>
                    <li><a href="#">Manual</a></li>
                    <li><a href="#">Liberty</a></li>
                    <li><a href="#">Recomendation</a></li>
                    <li><a href="#">Interpritation</a></li>
                    <li><a href="#">Manual</a></li>
                    <li><a href="#">Liberty</a></li>
                    <li><a href="#">Recomendation</a></li>
                    <li><a href="#">Interpritation</a></li>
                </ul>

            </div><!-- subscribe-area -->

        </div><!-- info-area -->
    </div>

</template>

<script>

    export default {
        props: {
            from: {
                type: String,
                default: 'HOME'
            }
        }
    }

</script>
