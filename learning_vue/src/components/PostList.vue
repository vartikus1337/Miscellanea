<template>
  <div class="post" v-for="post in posts" :key="post.id">
    <h3>{{ post.title }}</h3>
    <p>{{ post.body }}</p>
  </div>
</template>

<script>
export default {
  props: {
    posts: {
      type: Array,
      required: true,
    },
  },
};
</script>

<style scoped>
.post {
  display: flex;
  flex-direction: column;
  gap: 5px;
  margin-top: 20px;
  padding: 10px 15px;
  border: 2px solid darkblue;
}
</style>
