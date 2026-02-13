const rawCheckoutBase =
    import.meta.env.PUBLIC_WP_CHECKOUT_BASE ?? "/wp/checkout/?add-to-cart=";

const rawProductBase =
    import.meta.env.PUBLIC_WP_PRODUCT_BASE ??
    (() => {
        // If checkoutBase is an absolute URL (common in local dev), derive:
        //   http://localhost:8081/checkout/?add-to-cart= -> http://localhost:8081/product/
        if (/^https?:\/\//i.test(rawCheckoutBase)) {
            try {
                return new URL("../product/", rawCheckoutBase).toString();
            } catch {
                // fall through to default
            }
        }

        // Production-safe default (relative). WP can be exposed under /wp on the same host.
        return "/wp/product/";
    })();

const wpGraphqlUrl =
    import.meta.env.WP_GRAPHQL_URL || "http://localhost:8081/graphql";

const wpOrigin = (() => {
    try {
        return new URL(wpGraphqlUrl).origin;
    } catch {
        return "";
    }
})();

const resolveWpBase = (base: string) => {
    // Absolute URL: keep as-is.
    if (/^https?:\/\//i.test(base)) return base;

    // In dev, when WP is on a different origin (localhost:8081), prefix relative bases
    // so CTAs work without needing a reverse proxy.
    if (import.meta.env.DEV && wpOrigin && base.startsWith("/")) {
        return `${wpOrigin}${base}`;
    }

    // Production: keep relative (assumes same-origin reverse proxy or path mounting).
    return base;
};

export const checkoutBase = resolveWpBase(rawCheckoutBase);
export const productBase = resolveWpBase(rawProductBase);

export const checkoutUrl = (productId: number | string) =>
    `${checkoutBase}${productId}`;

export const productUrl = (slug: string) => {
    const b = productBase.endsWith("/") ? productBase : `${productBase}/`;
    const s = String(slug).replace(/^\/+|\/+$/g, "");
    return `${b}${s}/`;
};

