import { UserAPIInterface, UserInterface } from 'interfaces';
import { APIPlatformInstance, APIPlatformSerializer } from 'serializers/APIPlatformSerializer';

class User extends APIPlatformInstance implements UserInterface {
  email: string;
  username: string;

  constructor({
    email,
    username,
    ...rest
  }: UserAPIInterface) {
    super(rest);
    this.email = email;
    this.username = username;
  }
}

export class UserSerializer extends APIPlatformSerializer {
  serialize(v: UserAPIInterface) {
    return new User(v);
  }

  serializeMany(v: UserAPIInterface[]) {
    return v.map(c => new User(c))
  }
}
