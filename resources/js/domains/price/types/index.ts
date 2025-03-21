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
