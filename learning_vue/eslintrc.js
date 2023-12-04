module.exports = {
  extends: "eslint-config-antife",
  plugins: ["babel", "html"],
  rules: {
    "prettier/prettier": 0,
  },
  "prettier/prettier": [
    "error",
    {
      endOfLine: "lf",
    },
  ],
};
