export type TravelPackage = {
    title: string;
    image: string;
    price?: string;
    badge?: string;
    meta?: string;
    productId: number;
    productSlug: string;
    description: string;
    includes: string;
    highlights: string[];
    ctaLabel: string;
    featured?: boolean;
};

export const travelPackages: TravelPackage[] = [
    {
        title: "Lima Surf Pack",
        image: "/images/surf.webp",
        price: "US$ 560",
        badge: "4 Days",
        meta: "4 Days / 3 Nights • Lima",
        productId: 110,
        productSlug: "lima-surf-pack",
        description:
            "Surf four iconic Lima beaches with daily sessions, airport pickup, lodging, and meals.",
        includes:
            "Includes airport transfer, lodging, meals, and daily surf coaching.",
        highlights: ["Caballeros", "Senoritas", "Playa Norte", "El Silencio"],
        ctaLabel: "Book Lima Surf",
    },
    {
        title: "Lima Kitesurf Pack",
        image: "/images/kite.webp",
        price: "US$ 1,080",
        badge: "4 Days",
        meta: "4 Days / 3 Nights • Lima",
        productId: 111,
        productSlug: "lima-kitesurf-pack",
        description:
            "Kitesurf four Lima beaches with coaching, airport pickup, lodging, and meals.",
        includes:
            "Includes airport transfer, lodging, meals, and kitesurf sessions.",
        highlights: ["Caballeros", "Senoritas", "Playa Norte", "El Silencio"],
        ctaLabel: "Book Lima Kitesurf",
    },
    {
        title: "Lima Paragliding Pack",
        image: "/images/paragliding.webp",
        price: "US$ 210",
        badge: "2 Days",
        meta: "2 Days / 1 Night • Lima",
        productId: 112,
        productSlug: "lima-paragliding-pack",
        description:
            "Paragliding over the Costa Verde with certified pilots, airport pickup, lodging, and meals.",
        includes:
            "Includes paragliding flight, airport transfer, lodging, and meals.",
        highlights: ["San Miguel", "Magdalena", "San Isidro", "Miraflores"],
        ctaLabel: "Book Paragliding",
    },
    {
        title: "Tandem Pack",
        image: "/images/tandem.webp",
        price: "US$ 1,190",
        badge: "2 Jumps",
        meta: "2 Days / 1 Night • Lima + South Coast",
        productId: 113,
        productSlug: "tandem-pack",
        description:
            "Two classes and two tandem skydives with full briefing, airport pickup, lodging, and meals.",
        includes:
            "Includes 2 tandem jumps, safety briefing, transfers, lodging, and meals.",
        highlights: ["San Bartolo", "Santa Maria", "Paracas", "Lima"],
        ctaLabel: "Book Tandem",
    },
    {
        title: "Blue Crash",
        image: "/images/costaperuana.webp",
        price: "US$ 1,730",
        badge: "8 Days",
        meta: "8 Days / 7 Nights • Lima to Mancora",
        productId: 114,
        productSlug: "blue-crash",
        description:
            "Surf classes and practice across Lima, Huanchaco, Pimentel, and Mancora, two beaches per stop.",
        includes:
            "Includes airport transfers, lodging, meals, and guided surf sessions.",
        highlights: ["Lima", "Huanchaco", "Pimentel", "Mancora"],
        ctaLabel: "Book Blue Crash",
        featured: true,
    },
    {
        title: "Point Break",
        image: "/images/hero.webp",
        price: "US$ 1,170",
        badge: "4 Days",
        meta: "4 Days / 3 Nights • Lima",
        productId: 115,
        productSlug: "point-break",
        description:
            "One day of surf, one day of kitesurf, one day of paragliding, and one day of tandem.",
        includes:
            "Includes airport transfers, lodging, meals, and all activity sessions.",
        highlights: ["Caballeros", "Playa Norte", "Miraflores", "San Bartolo"],
        ctaLabel: "Book Point Break",
    },
    {
        title: "G.I Trip",
        image: "/images/pacasmayo.webp",
        price: "US$ 1,460",
        badge: "5 Days",
        meta: "5 Days / 4 Nights • Lima",
        productId: 116,
        productSlug: "g-i-trip",
        description:
            "Surf, kitesurf, diving, paragliding, and tandem skydive in five action-packed days.",
        includes:
            "Includes airport transfers, lodging, meals, and all activity sessions.",
        highlights: ["Caballeros", "Pucusana", "Miraflores", "San Bartolo"],
        ctaLabel: "Book G.I Trip",
    },
    {
        title: "FOES Trip",
        image: "/images/private-mma-training.webp",
        price: "US$ 1,480",
        badge: "6 Days",
        meta: "6 Days / 5 Nights • Lima",
        productId: 117,
        productSlug: "foes-trip",
        description:
            "Surf, kitesurf, paragliding, tandem skydive, plus an MMA training day.",
        includes:
            "Includes airport transfers, lodging, meals, and all activity sessions.",
        highlights: ["Costa Verde", "Miraflores", "San Miguel", "San Bartolo"],
        ctaLabel: "Book FOES Trip",
    },
];

