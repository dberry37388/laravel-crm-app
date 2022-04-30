import {Model} from "@tailflow/laravel-orion/lib/model";
import {HasMany} from "@tailflow/laravel-orion/lib/drivers/default/relations/hasMany";
import {Contact} from "./Contact";
import {BelongsTo} from "@tailflow/laravel-orion/lib/drivers/default/relations/belongsTo";
import {User} from "./User";

export class Company extends Model<{
    name: string,
    createdAt: Date,
    updatedAt: Date,
}> {
    public $resource(): string {
        return 'companies';
    }

    public contact(): HasMany<Contact> {
        return new HasMany(Contact, this);
    }

    public assignedTo(): BelongsTo<User> {
        return new BelongsTo(User, this);
    }
}
