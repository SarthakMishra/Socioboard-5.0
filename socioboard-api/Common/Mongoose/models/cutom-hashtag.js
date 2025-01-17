const mongoose = require('mongoose');
const moment = require('moment');

const { Schema } = mongoose;

mongoose.set('useCreateIndex', true);

const hashtaggroup = new Schema({
  hashtaggroupId: { type: Schema.Types.Mixed, index: true, unique: true },
  groupname: { type: String },
  userId: { type: String },
  teamId: { type: String },
  created: { type: Date, default: Date.now },
});

hashtaggroup.methods.insertHashTagGroup = function (posts) {
  return this.model('HashtagGroup')
    .insertMany(posts)
    .then((postdetails) => postdetails.length)
    .catch((error) => {
      console.log('error :', error);

      return 0;
    });
};

hashtaggroup.methods.getHashTagDetails = function (hashtaggroupId) {
  const query = {
    hashtaggroupId,
  };

  return this.model('HashtagGroup')
    .find(query)
    .then((result) => result)
    .catch((error) => {
      console.log(error);
    });
};

// hashtaggroup.methods.getPreviousPost = function (keyword, skip, limit) {
//     var query = {
//         $or: [
//             { description: new RegExp(keyword, 'i') },
//             { title: new RegExp(keyword, 'i') },
//             { publishedDate: new RegExp(keyword, 'i') },
//             { rating: new RegExp(keyword, 'i') }]
//     };
//     return this.model('HashtagGroup')
//         .find(query)
//         .sort({ publishedDate: -1 })
//         .skip(skip)
//         .limit(limit)
//         .then(function (result) {
//             return result;
//         })
//         .catch(function (error) {
//         });
// };

const HashtagGroupModel = mongoose.model('HashtagGroup', hashtaggroup);

module.exports = HashtagGroupModel;
