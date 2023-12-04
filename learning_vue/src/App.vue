<template class="app">
  <form class="form" @submit.prevent>
    <h3>Создание постов</h3>
    <input
      class="input"
      @input="title = $event.target.value"
      v-bind:value="title"
      type="text"
      placeholder="Название"
    />
    <input
      class="input"
      v-bind:value="body"
      @input="body = $event.target.value"
      type="text"
      placeholder="Описание"
    />
    <button class="btn" @click="createPost">Создать</button>
  </form>
  <div class="post" v-for="post in posts" :key="post.id">
    <h3>{{ post.title }}</h3>
    <p>{{ post.body }}</p>
  </div>
</template>

<script>
export default {
  data() {
    return {
      posts: [
        {
          id: 1,
          title: "Vue",
          body: "lorem ipsum dolor sit 1",
        },
        {
          id: 2,
          title: "React",
          body: "lorem ipsum dolor sit 2",
        },
      ],
      title: "",
      body: "",
    };
  },
  methods: {
    createPost() {
      this.posts.push({
        id: this.posts.length + 1,
        title: this.title,
        body: this.body,
      });
      this.title = "";
      this.body = "";
    },
  },
};
</script>

<style scoped>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

.app {
  padding: 20px;
}

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

button:hover {
  cursor: pointer;
}

.post {
  display: flex;
  flex-direction: column;
  gap: 5px;
  margin-top: 20px;
  padding: 10px 15px;
  border: 2px solid darkblue;
}
</style>
