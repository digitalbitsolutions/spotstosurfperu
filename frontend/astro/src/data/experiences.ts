export type Experience = {
    slug: string;
    title: string;
    excerpt: string;
    description: string;
    image: string;
    icon: string;
    accent: "ocean" | "sun" | "sky" | "green" | "slate";
    highlights: string[];
    tags: string[];
    featured?: boolean;
};

export const experiences: Experience[] = [
    {
        slug: "transport",
        title: "Safe Transport & Airport Transfers",
        excerpt: "Door-to-door private transfers across Lima and the coast.",
        description:
            "From airport pickup to hotel drop-off, surf sessions, and day trips, we move you safely and comfortably. Expect board-friendly vehicles, punctual drivers, and routes planned around your schedule.",
        image: "/images/transporte-premium.webp",
        icon: "airport_shuttle",
        accent: "ocean",
        highlights: [
            "Airport, hotels, surf spots, and excursions",
            "Board-friendly space and secure storage",
            "Local drivers and flexible pick-up times",
            "Perfect for groups and travel agencies",
        ],
        tags: ["Airport", "Private", "Board-friendly", "Flexible"],
        featured: true,
    },
    {
        slug: "surf-lessons",
        title: "Surf Lessons & Coaching",
        excerpt: "Beginner to advanced coaching with trusted local instructors.",
        description:
            "Learn fast with sessions tailored to your level and the day's conditions. We choose the right beach, keep things safe, and help you progress with clear, practical coaching in the water.",
        image: "/images/surf.webp",
        icon: "surfing",
        accent: "sun",
        highlights: [
            "All levels: first-timers to advanced",
            "Spot selection based on swell and wind",
            "Technique, safety, and ocean awareness",
            "Private or small-group sessions",
        ],
        tags: ["All levels", "Coaching", "Safety-first", "Progression"],
    },
    {
        slug: "kitesurf",
        title: "Kitesurf Sessions",
        excerpt: "Wind-powered sessions with guidance, coaching, and logistics covered.",
        description:
            "Chase the best wind windows with a local crew that knows the coastline. Whether you're learning the basics or refining tricks, we help you choose the right spot and make the most of the conditions.",
        image: "/images/kite.webp",
        icon: "kitesurfing",
        accent: "sky",
        highlights: [
            "Beginner lessons and progression coaching",
            "Spot selection by wind forecast",
            "Assistance with setup and safety",
            "Easy add-on to surf packages",
        ],
        tags: ["Lessons", "Coaching", "Wind spots", "Support"],
    },
    {
        slug: "paragliding",
        title: "Paragliding Over the Coast",
        excerpt: "A tandem flight with certified pilots and epic Pacific views.",
        description:
            "Take off over Lima's coastline and glide above the ocean for a once-in-a-lifetime perspective. We schedule around weather windows and coordinate transport so it fits smoothly into your trip.",
        image: "/images/paragliding.webp",
        icon: "paragliding",
        accent: "sky",
        highlights: [
            "Tandem flights with certified pilots",
            "Weather-based scheduling for safety",
            "Perfect for first-time flyers",
            "Easy to combine with city plans",
        ],
        tags: ["Tandem", "Views", "Certified", "Adrenaline"],
    },
    {
        slug: "tandem",
        title: "Tandem Skydiving",
        excerpt: "Bucket-list adrenaline with a full safety briefing and coordination.",
        description:
            "If you want maximum adrenaline, tandem skydiving delivers. We'll help you plan the day, coordinate timing, and combine it with transport, meals, or other activities depending on your itinerary.",
        image: "/images/tandem.webp",
        // Material Symbols: "parachute" is not available in our font, so it renders as text.
        icon: "paragliding",
        accent: "slate",
        highlights: [
            "Safety briefing and experienced instructors",
            "Ideal for solo travelers or groups",
            "Optional transport coordination",
            "Add it to a custom package",
        ],
        tags: ["Tandem", "Briefing", "High adrenaline", "Custom"],
    },
    {
        slug: "mma",
        title: "MMA Personal Training",
        excerpt: "Private sessions tailored to your level, goals, and schedule.",
        description:
            "Train with personalized MMA sessions designed around your objectives, from fundamentals to conditioning. It's a powerful add-on for athletes, fitness-focused travelers, or anyone curious to try.",
        image: "/images/private-mma-training.webp",
        icon: "sports_mma",
        accent: "sun",
        highlights: [
            "1:1 or small-group training",
            "Technique + conditioning focus",
            "Beginner-friendly and goal-oriented",
            "Schedule around your surf days",
        ],
        tags: ["Private", "Custom", "Fitness", "Technique"],
    },
    {
        slug: "gastronomy",
        title: "Peruvian Gastronomy",
        excerpt: "Curated food stops and local recommendations beyond the tourist trail.",
        description:
            "Peru is a top food destination for a reason. We plan gastronomy experiences that match your vibe, from classic ceviche to local favorites, with options for groups, couples, and families.",
        image: "/images/gastronomia-peruana.webp",
        icon: "restaurant",
        accent: "sun",
        highlights: [
            "Local spots, signature dishes, and food culture",
            "Great between surf sessions or on rest days",
            "Diet-friendly options when requested",
            "Combine with transport and excursions",
        ],
        tags: ["Ceviche", "Local", "Food tour", "Custom"],
    },
    {
        slug: "excursions",
        title: "Excursions & Day Trips",
        excerpt: "Culture, nature, and coastal escapes to round out your adventure.",
        description:
            "Add variety to your trip with curated excursions that fit your schedule. Think viewpoints, neighborhoods, coastal drives, and nature escapes that balance your surf and adrenaline days.",
        image: "/images/costaperuana.webp",
        icon: "explore",
        accent: "green",
        highlights: [
            "Flexible itineraries and private options",
            "Great for groups, couples, or families",
            "Pair with transport for a seamless day",
            "Designed around your timing",
        ],
        tags: ["Culture", "Nature", "Private", "Flexible"],
    },
    {
        slug: "gear",
        title: "Board & Gear Support",
        excerpt: "Help choosing the right board and essentials for your surf plan.",
        description:
            "Whether you travel light or want to swap boards during the trip, we help you get dialed in. Ask us about board options, essentials, and how to coordinate gear with your transport and sessions.",
        image: "/images/hero.webp",
        icon: "inventory_2",
        accent: "ocean",
        highlights: [
            "Board guidance based on level and waves",
            "Coordinate gear with lessons and transport",
            "Ideal for multi-stop itineraries",
            "Simple add-on to any package",
        ],
        tags: ["Boards", "Essentials", "Support", "Add-on"],
    },
];
