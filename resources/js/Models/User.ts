import {Model} from "@tailflow/laravel-orion/lib/model";

export class User extends Model<{
    firstName: string,
    lastName: string,
    createdAt: Date,
    updatedAt: Date,
}> {
    public $resource(): string {
        return 'users';
    }
}
