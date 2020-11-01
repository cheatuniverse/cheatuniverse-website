import { SerializeItemInterface } from 'interfaces/SerializerInterface';
import { APIPlatformItemInterface } from 'serializers/APIPlatformSerializer';

export interface VersionAPIInterface extends APIPlatformItemInterface {
  name: string;
}

export interface VersionInterface extends SerializeItemInterface {
  name: string;
}
