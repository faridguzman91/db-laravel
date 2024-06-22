<template lang="">
    <section
        id="home"
        class="bg-light-primary dark:bg-dark-primary heroContent flex items-center overflow-hidden py-32 lg:h-[85vh] lg:py-0"
    >
        <video autoplay muted loop id="myVideo">
            <source src="../../../public/video/intro.mp4" type="video/mp4" />
            Your browser does not support HTML5 video.
        </video>

        <div class="container mx-auto h-full">
            <div class="flex h-full items-center pt-8">
                <div class="flex flex-1 flex-col items-center lg:items-start">
                    <p class="text-md mb-[22px] font-mono text-lg">
                        Contemporary Artist
                    </p>
                    <h1
                        class="font-mono text-4xl font-bold leading-[44px] md:text-5xl md:leading-tight md:tracking-[-2px]"
                    >
                        David Bade
                    </h1>
                    <div
                        class="m-auto flex w-full flex-row items-center justify-start border border-x-0 border-gray-500 font-mono"
                    >
                        <button
                            class="hover:bg-light-secondary hover:text-light-tail-500 btn btn-md mb-6 mt-6 bg-accent transition-all md:btn-lg"
                        >
                            paintings
                        </button>
                        <button
                            class="hover:bg-light-secondary hover:text-light-tail-500 btn btn-md mb-6 mt-6 bg-accent transition-all md:btn-lg"
                        >
                            sculpture
                        </button>
                        <button
                            class="hover:bg-light-secondary hover:text-light-tail-500 btn btn-md mb-6 mt-6 bg-accent transition-all md:btn-lg"
                        >
                            exhibitions
                        </button>

                        <button
                            class="hover:bg-light-secondary hover:text-light-tail-500 btn btn-md mb-6 mt-6 bg-accent transition-all md:btn-lg"
                        >
                            projects
                        </button>
                        <button
                            class="hover:bg-light-secondary hover:text-light-tail-500 btn btn-md mb-6 mt-6 bg-accent transition-all md:btn-lg"
                        >
                            archive
                        </button>
                    </div>
                    <!-- <button id="myBtn" class="hover:bg-light-secondary hover:text-light-tail-500 btn btn-md mb-6 mt-6 bg-accent transition-all md:btn-lg" @click="myFunction">Pause Video</button> -->
                </div>
                <div class="carousel w-1/2 rounded-box">
                    <div class="carousel-item">
                        <img
                            src="../../../public/img/david-compressed-jpg/aaien-met-de-tong-.jpg"
                            style="width: 300px; background-position: fill"
                            alt="Burger"
                        />
                    </div>
                    <div class="carousel-item">
                        <img
                            src="../../../public/img/david-compressed-jpg/IMG_9810.jpg"
                            style="width: 300px; background-position: center"
                            alt="Burger"
                        />
                    </div>
                    <div class="carousel-item">
                        <img
                            src="../../../public/img/david-compressed-jpg/drawing-01.jpg"
                            style="width: 300px; background-position: center"
                            alt="Burger"
                        />
                    </div>
                    <div class="carousel-item">
                        <img
                            src="../../../public/img/david-compressed-jpg/drawing-02.jpg"
                            style="width: 300px; background-position: center"
                            alt="Burger"
                        />
                    </div>
                    <div class="carousel-item">
                        <img
                            src="../../../public/img/david-compressed-jpg/drawing-03.jpg"
                            style="width: 300px; background-position: center"
                            alt="Burger"
                        />
                    </div>
                    <div class="carousel-item">
                        <img
                            src="../../../public/img/david-compressed-jpg/drawing-04.jpg"
                            style="width: 300px; background-position: center"
                            alt="Burger"
                        />
                    </div>
                    <div class="carousel-item">
                        <img
                            src="../../../public/img/david-compressed-jpg/drawing-05.jpg"
                            style="width: 300px; background-position: center"
                            alt="Burger"
                        />
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>
#myVideo {
    position: absolute;
    right: 0;
    bottom: 0;
    min-width: fit-content;
    min-height: fit-content;
    width: 100%;
    height: auto;
    z-index: -1;
    opacity: 0.2;
}

#myBtn {
    width: 200px;
    font-size: 18px;
    padding: 10px;
    border: none;
    cursor: pointer;
}

#myBtn:hover {
    background: #ddd;
    color: black;
}

.heroContent {
    position: relative;
    z-index: 1;
    opacity: 1;
}
</style>
