<template>
  <div>
    <button v-on:click="addLike">Like</button>
    <button @click="addDislike">disLike</button>
  </div>
  <div>
    <div>Кол-во лайков: {{ likes }}</div>
    <div>Кол-во дизов: {{ dislike }}</div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      likes: 0,
      dislike: 0,
    };
  },
  methods: {
    addLike() {
      this.likes++;
    },
    addDislike() {
      this.dislike++;
    },
  },
};
</script>
