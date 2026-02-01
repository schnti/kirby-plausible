panel.plugin("schnti/plausible", {
  components: {
    "k-plausible-view": {
      props: {
        sharedLink: String,
      },

      computed: {
        theme() {
          return this.$panel.theme?.current ?? "light";
        },
        iframeSrc() {
          if (!this.sharedLink) return "";
          const sep = this.sharedLink.includes("?") ? "&" : "?";
          return (
            this.sharedLink +
            sep +
            "embed=true&theme=" +
            encodeURIComponent(this.theme) +
            "&background=transparent"
          );
        },
      },
      render(h) {
        const content = this.sharedLink
          ? h("iframe", {
            attrs: {
              "plausible-embed": "",
              src: this.iframeSrc,
              frameborder: "0",
              loading: "lazy",
              scrolling: "no",
            },
            class: "plausible-iframe",
          })
          : h(
            "k-box",
            { props: { icon: "info", theme: "info" } },
            [
              "You need to set ",
              h("code", "schnti.plausible.sharedLink"),
              " in ",
              h("code", "config.php"),
            ]
          );

        return h(
          "k-panel-inside",
          { class: "k-plausible-view" },
          [h("k-section", [content])]
        );
      },
    },
  },
});
