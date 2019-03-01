<template>
  <div id="app">
    <counter></counter>
  </div>
</template>

<script>
import Counter from './components/Counter.vue';

export default {
  name: 'app',
  components: { Counter },
  data () {
    return {
      msg: 'Welcome to Your Vue.js App'
    }
  }
}
</script>
