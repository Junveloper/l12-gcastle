import { z } from 'zod';

export const priceTypeSchema = z.enum(['membership', 'non_member', 'night_special']);
export type PriceType = z.infer<typeof priceTypeSchema>;

export const priceSchema = z.object({
    id: z.string(),
    type: priceTypeSchema,
    price: z.number(),
    duration: z.number(),
    isMembershipMinimum: z.boolean(),
    purchasableFrom: z.coerce.date().nullable(),
    purchasableTo: z.coerce.date().nullable(),
});
export type Price = z.infer<typeof priceSchema>;

export const gameSchema = z.object({
    id: z.string(),
    name: z.string(),
    isFree: z.boolean(),
    createdAt: z.coerce.date(),
});
export type Game = z.infer<typeof gameSchema>;

export const platformSchema = z.object({
    id: z.string(),
    name: z.string(),
    displayOrder: z.number(),
});
export type Platform = z.infer<typeof platformSchema>;

export const platformWithRelationsSchema = platformSchema.extend({
    relations: z.object({
        games: gameSchema.array(),
    }),
});
export type PlatformWithRelations = z.infer<typeof platformWithRelationsSchema>;

export const gameListSchema = z.object({
    lastUpdated: z.coerce.date(),
    platforms: platformWithRelationsSchema.array(),
});
export type GameList = z.infer<typeof gameListSchema>;

export const frequentlyAskedQuestionSchema = z.object({
    id: z.string(),
    question: z.string(),
    answer: z.string(),
    displayOrder: z.number(),
});
export type FrequentlyAskedQuestion = z.infer<typeof frequentlyAskedQuestionSchema>;

export const businessKeyValueSchema = z.object({
    id: z.string(),
    usage: z.enum(['social_media', 'contact', 'map', 'address']),
    key: z.string(),
    label: z.string(),
    value: z.string(),
});
export type BusinessKeyValue = z.infer<typeof businessKeyValueSchema>;
