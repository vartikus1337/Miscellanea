<template>
  <form class="form" @submit.prevent>
    <h3>Создание постов</h3>
    <input
      class="input"
      @input="post.title = $event.target.value"
      v-bind:value="title"
      type="text"
      placeholder="Название"
    />
    <input
      class="input"
      v-bind:value="body"
      @input="post.body = $event.target.value"
      type="text"
      placeholder="Описание"
    />
    <button class="btn" @click="createPost">Создать</button>
  </form>
</template>

<script>
export default {
  data() {
    return {
      post: {
        title: "",
        body: "",
      },
    };
  },
};
</script>

<style scoped>
.form {
  display: flex;
  flex-direction: column;
}

.input {
  width: 100%;
  border: 1px solid blue;
  padding: 10px 15px;
  margin-top: 15px;
}

.btn {
  margin-top: 15px;
  align-self: flex-end;
  padding: 10px 15px;
  background: none;
  border: 1px solid blue;
  color: blue;
}
</style>
