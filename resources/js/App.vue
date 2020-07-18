<template>
  <div>
    <header>
      <Navbar />
    </header>
    <main>
      <div class="container">
        <Message /> <!-- ★ 追加 -->
        <RouterView />
      </div>
    </main>
    <Footer />
  </div>
</template>

<script>
import Message from './components/Message.vue' // ★ 追加
import Navbar from './components/Navbar.vue'
import Footer from './components/Footer.vue'
import { INTERNAL_SERVER_ERROR } from './util'
export default {
  components: {
    Message, // ★ 追加
    Navbar,
    Footer
  },
  computed: {
    errorCode () {
      return this.$store.state.error.code
    }
  },
  watch: {
    errorCode: {
      handler (val) {
        if (val === INTERNAL_SERVER_ERROR) {
          this.$router.push('/500')
        }
      },
      immediate: true
    },
    $route () {
      this.$store.commit('error/setCode', null)
    }
  }
}
</script>
