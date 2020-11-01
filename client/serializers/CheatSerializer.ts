import { CheatAPIInterface, CheatInterface } from 'interfaces';
import { APIPlatformInstance, APIPlatformSerializer } from 'serializers/APIPlatformSerializer';
import { VersionSerializer } from 'serializers/VersionSerializer';
import { TagSerializer } from 'serializers/TagSerializer';

class Cheat extends APIPlatformInstance implements CheatInterface {
  chips: string[];
  downloadLink: string;
  name: string;
  youtubeLink: string;

  constructor({
    downloadLink,
    name,
    tags,
    version,
    youtubeLink,
    ...rest
  }: CheatAPIInterface) {
    super(rest);
    this.chips = [new VersionSerializer().serialize(version).name, ...tags.map(t => new TagSerializer().serialize(t).label)];
    this.downloadLink = downloadLink;
    this.name = name;
    this.youtubeLink = youtubeLink;
  }
}

export class CheatSerializer extends APIPlatformSerializer {
  serialize(v: CheatAPIInterface) {
    return new Cheat(v);
  }

  serializeMany(v: CheatAPIInterface[]) {
    return v.map(c => new Cheat(c))
  }
}
