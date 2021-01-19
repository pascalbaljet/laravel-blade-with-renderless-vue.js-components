<script>
export default {
  props: {
    default: Array,
  },

  data() {
    return {
      items: [],
    };
  },

  mounted() {
    this.items = this.default ? this.default : [];
  },

  render() {
    return this.$scopedSlots.default({
      items: this.items,
      push: (value) => {
        this.items.push(value);
      },
      put: (key, value) => {
        this.items[key] = value;
      },
    });
  },
};
</script>