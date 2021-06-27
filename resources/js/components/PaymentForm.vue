<template>
  <div class="container">
    <img
      v-if="!isLoad"
      src="images/loading.gif"
      alt=""
      style=""
    />

    <div id="login-page" class="row">
      <div class="col s4 z-depth-4 card-panel">
        <div class="row">
          <div class="input-field col s4 center-align">
            <img src="images/logo.jpeg" alt="" class="responsive-img valign" />
          </div>
        </div>

        <div class="carousel carousel-slider center">
          <div class="carousel-item white-text" href="#one">
            <img src="https://lorempixel.com/800/400/food/1" />
          </div>
          <div class="carousel-item white-text" href="#two">
            <img src="https://lorempixel.com/800/400/food/2" />
          </div>
          <div class="carousel-item white-text" href="#three">
            <img src="https://lorempixel.com/800/400/food/3" />
          </div>
          <div class="carousel-item white-text" href="#four">
            <img src="https://lorempixel.com/800/400/food/4" />
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 center">
            <p class="center login-form-text">
              <br />
              Bienvenue, veuillez saisir le montant à payer
            </p>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <input
              required
              id="item_price"
              type="number"
              v-model="item_price"
              autofocus=""
              min="100"
            />
            <label for="item_price" class="center-align">Montant à payer</label>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s12">
            <button
              type="submit"
              @click="send"
              class="btn waves-effect waves-light col s12 submitButton"
            >
              Valider
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      isLoad: true,
      item_price: "",
    };
  },
  mounted() {
    // setTimeout(function () {
    //   this.isLoad = false;
    //   console.log(this.isLoad)
    // }, 1000);
  },
  methods: {
    send() {
      axios
        .post("/send", { item_price: this.item_price })
        .then(function (jsonResponse) {
          if (jsonResponse.data.success == 1) {
            window.open(jsonResponse.data.redirectUrl, "_blank");
                        this.item_price = "";

          }
        });
    },
  },
};
</script>
<style >
img.responsive-img,
video.responsive-video {
  max-width: 50%;
  height: auto;
  align-items: center;
}
</style>
