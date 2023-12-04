<template>
  <div class="app">
    <post-form @create="createPost" />
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
    createPost(post) {
      // Надо это в PostForm закинуть но мне лень
      // if (post.title.length == 0 || post.body.length == 0) {
      //   return;
      // }
      this.posts.push(post);
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
