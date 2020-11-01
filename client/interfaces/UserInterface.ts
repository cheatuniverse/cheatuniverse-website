import { SerializeItemInterface } from 'interfaces/SerializerInterface';
import { APIPlatformItemInterface } from 'serializers/APIPlatformSerializer';

export interface UserAPIInterface extends APIPlatformItemInterface {
  email: string;
  username: string;
}

export interface UserInterface extends SerializeItemInterface {
  email: string;
  username: string;
}
