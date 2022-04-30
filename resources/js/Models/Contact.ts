import {Model} from "@tailflow/laravel-orion/lib/model";

export class Contact extends Model<{
    name: string,
    createdAt: Date,
    updatedAt: Date,
}> {
    public $resource(): string {
        return 'contacts';
    }
}
