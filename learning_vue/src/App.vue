<template>
  <div class="app">
    <post-form />
    <!-- <post-list on-bind:posts="posts" тож самое -->
    <post-list :posts="posts" />
  </div>
</template>

<script>
import PostList from "@/components/PostList.vue";
import PostForm from "@/components/PostForm.vue";

export default {
  components: {
    PostList,
    PostForm,
  },
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

<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

.app {
  padding: 20px;
}

button:hover {
  cursor: pointer;
}
</style>
