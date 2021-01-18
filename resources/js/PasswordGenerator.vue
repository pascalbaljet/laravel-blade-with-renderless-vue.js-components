<script>
export default {
  data() {
    return {
      password: null,
    };
  },

  render() {
    return this.$scopedSlots.default({
      password: this.password,
      generate: () => {
        var charSet =
          "!#$%&()*+,-.0123456789:;<=>?@ABCDEFGHIJKLMNOPQRSTUVWXYZ[]^_abcdefghijklmnopqrstuvwxyz{|}";
        var randomString = "";

        for (var i = 0; i < 16; i++) {
          var randomPoz = Math.floor(Math.random() * charSet.length);
          randomString += charSet.substring(randomPoz, randomPoz + 1);
        }

        this.password = randomString;
      },
    });
  },
};
</script>