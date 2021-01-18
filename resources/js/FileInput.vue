<script>
export default {
  data() {
    return {
      filename: null,
    };
  },

  render() {
    return this.$scopedSlots.default({
      filename: this.filename,
      changed: (e) => {
        const files = e.target.files;

        this.filename = files.length > 0 ? files[0].name : null;
      },
    });
  },
};
</script>