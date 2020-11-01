import { APIPlatform } from './Abstract';
import { CheatSerializer } from 'serializers';

export class Cheats extends APIPlatform {
  endpoint = '/cheats';
  serializer = new CheatSerializer();
}
