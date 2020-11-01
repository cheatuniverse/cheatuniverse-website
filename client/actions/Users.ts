import { APIPlatform } from './Abstract';
import { UserSerializer } from 'serializers';
import { Token } from 'Storage/Token';

export interface CommonUserInterface {
  password: string;
  username: string;
}

export interface RegisterInterface extends CommonUserInterface {
  email: string;
}

export class Users extends APIPlatform {
  endpoint = '/users';
  serializer = new UserSerializer();

  login(data: CommonUserInterface) {
    this.endpoint = '/authentication_token';
    return this.postRequest({ data }).then(({ data }) => data)
  }

  register(data: RegisterInterface) {
    return this.postRequest({ data }).then(({ data }) => this.serializer.serialize(data))
  }

  static logout() {
    new Token().remove();
    window.location.pathname = '/login';
  }
}
